<?php

namespace App\Repository;

use App\Entity\ShopStaffAssignment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShopStaffAssignment>
 *
 * @method ShopStaffAssignment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopStaffAssignment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopStaffAssignment[]    findAll()
 * @method ShopStaffAssignment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopStaffAssignmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopStaffAssignment::class);
    }

//    /**
//     * @return ShopStaffAssignment[] Returns an array of ShopStaffAssignment objects
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

//    public function findOneBySomeField($value): ?ShopStaffAssignment
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
