<?php

namespace App\Repository;

use App\Entity\SimStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SimStatus>
 *
 * @method SimStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimStatus[]    findAll()
 * @method SimStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimStatus::class);
    }

//    /**
//     * @return SimStatus[] Returns an array of SimStatus objects
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

//    public function findOneBySomeField($value): ?SimStatus
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
