<?php

namespace App\Repository;

use App\Entity\VehicleDriverAssignment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehicleDriverAssignment>
 *
 * @method VehicleDriverAssignment|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleDriverAssignment|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleDriverAssignment[]    findAll()
 * @method VehicleDriverAssignment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleDriverAssignmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleDriverAssignment::class);
    }

//    /**
//     * @return VehicleDriverAssignment[] Returns an array of VehicleDriverAssignment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VehicleDriverAssignment
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
