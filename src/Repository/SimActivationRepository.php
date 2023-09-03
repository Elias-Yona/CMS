<?php

namespace App\Repository;

use App\Entity\SimActivation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SimActivation>
 *
 * @method SimActivation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimActivation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimActivation[]    findAll()
 * @method SimActivation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimActivationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimActivation::class);
    }

//    /**
//     * @return SimActivation[] Returns an array of SimActivation objects
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

//    public function findOneBySomeField($value): ?SimActivation
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
