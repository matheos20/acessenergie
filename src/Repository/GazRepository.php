<?php

namespace App\Repository;

use App\Entity\Gaz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gaz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gaz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gaz[]    findAll()
 * @method Gaz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GazRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gaz::class);
    }

    // /**
    //  * @return Gaz[] Returns an array of Gaz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gaz
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
