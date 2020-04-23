<?php

namespace App\Command;

use App\Entity\Product;
use App\Entity\ProductSource;
use App\Repository\ProductSourceRepository;
use App\Service\Context;
use App\Service\ProductSorter;
use App\Service\ProductSorterDB;
use App\Service\ProductSorterFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ExecutorCommand extends Command
{
    protected static $defaultName = 'app:executor';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Command for convert ProductSource to Product Table')
            ->addArgument('type', InputArgument::OPTIONAL, 'Type convert');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $type = $input->getArgument('type');

        $context = new Context();

        if ($type === 'db') {
            $context->setStrategy(new ProductSorterDB($this->entityManager));
        } elseif ($type === 'file') {
            $context->setStrategy(new ProductSorterFile());
        } else {
            return 1;
        }
        $context->handle();
        return 0;
    }

}
