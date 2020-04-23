<?php

namespace App\Service;

use App\Dto\Product;
use App\Entity\ProductSource;
use App\Regex\ProductTemplate;
use App\Repository\ProductSourceRepository;
use Doctrine\ORM\EntityManagerInterface;
use SplStack;

class ProductSorterDB implements StrategyInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle()
    {
        /* @var ProductSourceRepository $repository */
        $repository = $this->entityManager->getRepository(ProductSource::class);
        $productRepository = $this->entityManager->getRepository(\App\Entity\Product::class);

        $productSource = $repository->findAll();

        if (empty($productSource)) {
            return [];
        }


        $stack = new SplStack();

        $badIds = [];

        foreach ($productSource as $key => $product) {

            if (!$product->isStatusNew()) {
                continue;
            }

            preg_match(ProductTemplate::PRODUCT, $product->getTitle(), $matches);
            preg_match(ProductTemplate::SEASON, $product->getTitle(), $season);

            if (empty($matches) || empty($season)) {
                $badIds[] = $product->getId();
                continue;
            }

            $productDto = new Product();
            $productDto->brand = $matches[1];
            $productDto->model = $matches[2];
            $productDto->width = $matches[3];
            $productDto->height = $matches[4];
            $productDto->design = $matches[5];
            $productDto->diameter = $matches[6];
            $productDto->indexLoad = $matches[7];
            $productDto->indexSpeed = $matches[8];
            $productDto->season = $season[1];

            preg_match(ProductTemplate::ATTRIBUTE, $product->getTitle(), $attribute);
            if ($attribute) {
                $productDto->attribute = $attribute[1];
            }

            preg_match(ProductTemplate::RUNFLAT, $product->getTitle(), $runflat);
            if ($runflat) {
                $productDto->runflat = $runflat[1];
            }

            preg_match(ProductTemplate::CAMERA, $product->getTitle(), $camera);
            if ($camera) {
                $productDto->camera = $camera[1];
            }

            $stack->push($productDto);
        }

        $productRepository->saveProduct($stack);
        return $repository->updateApproveAndReject($productSource, $badIds);

    }

}