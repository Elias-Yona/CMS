<?php

namespace App\Repository;

use App\Entity\DriverDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DriverDetail>
 *
 * @method DriverDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method DriverDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method DriverDetail[]    findAll()
 * @method DriverDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DriverDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DriverDetail::class);
    }

//    /**
//     * @return DriverDetail[] Returns an array of DriverDetail objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DriverDetail
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
