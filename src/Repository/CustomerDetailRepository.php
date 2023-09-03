<?php

namespace App\Repository;

use App\Entity\CustomerDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CustomerDetail>
 *
 * @method CustomerDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerDetail[]    findAll()
 * @method CustomerDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerDetail::class);
    }

//    /**
//     * @return CustomerDetail[] Returns an array of CustomerDetail objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CustomerDetail
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
