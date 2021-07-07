<?php

namespace App\Repository;

use App\Entity\ElectricitePlus20;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ElectricitePlus20|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElectricitePlus20|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElectricitePlus20[]    findAll()
 * @method ElectricitePlus20[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElectricitePlus20Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElectricitePlus20::class);
    }

    // /**
    //  * @return ElectricitePlus20[] Returns an array of ElectricitePlus20 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElectricitePlus20
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
