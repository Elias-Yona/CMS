<?php

namespace App\Repository;

use App\Entity\VehicleStaffAssignment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehicleStaffAssignment>
 *
 * @method VehicleStaffAssignment|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleStaffAssignment|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleStaffAssignment[]    findAll()
 * @method VehicleStaffAssignment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleStaffAssignmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleStaffAssignment::class);
    }

//    /**
//     * @return VehicleStaffAssignment[] Returns an array of VehicleStaffAssignment objects
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

//    public function findOneBySomeField($value): ?VehicleStaffAssignment
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
