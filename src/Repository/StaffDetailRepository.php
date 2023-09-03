<?php

namespace App\Repository;

use App\Entity\StaffDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StaffDetail>
 *
 * @method StaffDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method StaffDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method StaffDetail[]    findAll()
 * @method StaffDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaffDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StaffDetail::class);
    }

//    /**
//     * @return StaffDetail[] Returns an array of StaffDetail objects
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

//    public function findOneBySomeField($value): ?StaffDetail
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
