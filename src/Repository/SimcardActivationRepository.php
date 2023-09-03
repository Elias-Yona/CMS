<?php

namespace App\Repository;

use App\Entity\SimcardActivation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SimcardActivation>
 *
 * @method SimcardActivation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimcardActivation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimcardActivation[]    findAll()
 * @method SimcardActivation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimcardActivationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimcardActivation::class);
    }

//    /**
//     * @return SimcardActivation[] Returns an array of SimcardActivation objects
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

//    public function findOneBySomeField($value): ?SimcardActivation
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
