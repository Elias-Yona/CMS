<?php

namespace App\Repository;

use App\Entity\SimCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SimCard>
 *
 * @method SimCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimCard[]    findAll()
 * @method SimCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimCard::class);
    }

//    /**
//     * @return SimCard[] Returns an array of SimCard objects
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

//    public function findOneBySomeField($value): ?SimCard
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
