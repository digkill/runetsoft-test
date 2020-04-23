<?php

namespace App\Repository;

use App\Entity\ProductSource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use SplQueue;
use Traversable;

/**
 * @method ProductSource|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductSource|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductSource[]    findAll()
 * @method ProductSource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductSourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductSource::class);
    }

    public function updateApproveAndReject($productSources, $badIds): Traversable
    {
        $em = $this->getEntityManager();
        $q = new SplQueue();

        if (empty($productSources)) {
            return $q;
        }

        array_map(function (ProductSource $productSource) use ($em, $badIds, $q) {

            if ($productSource->isStatusNew()) {

                if (in_array($productSource->getId(), $badIds)) {
                    $productSource->setStatus(ProductSource::STATUS_REJECT);
                } else {
                    $productSource->setStatus(ProductSource::STATUS_DONE);
                }
                $em->persist($productSource);
                $q->push($productSource->getId());
            }
        }, $productSources);
        $em->flush();
        return $q;
    }



    // /**
    //  * @return ProductSource[] Returns an array of ProductSource objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductSource
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
