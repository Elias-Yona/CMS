<?php

namespace App\Repository;

use App\Entity\StaffEarning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StaffEarning>
 *
 * @method StaffEarning|null find($id, $lockMode = null, $lockVersion = null)
 * @method StaffEarning|null findOneBy(array $criteria, array $orderBy = null)
 * @method StaffEarning[]    findAll()
 * @method StaffEarning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaffEarningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StaffEarning::class);
    }

//    /**
//     * @return StaffEarning[] Returns an array of StaffEarning objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StaffEarning
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
