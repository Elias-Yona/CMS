<?php

namespace App\Repository;

use App\Entity\SimcardType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SimcardType>
 *
 * @method SimcardType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimcardType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimcardType[]    findAll()
 * @method SimcardType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimcardTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimcardType::class);
    }

//    /**
//     * @return SimcardType[] Returns an array of SimcardType objects
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

//    public function findOneBySomeField($value): ?SimcardType
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
