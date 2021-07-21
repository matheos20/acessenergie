<?php

namespace App\Repository;

use App\Entity\GazPlus20;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GazPlus20|null find($id, $lockMode = null, $lockVersion = null)
 * @method GazPlus20|null findOneBy(array $criteria, array $orderBy = null)
 * @method GazPlus20[]    findAll()
 * @method GazPlus20[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GazPlus20Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GazPlus20::class);
    }

    // /**
    //  * @return GazPlus20[] Returns an array of GazPlus20 objects
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
    public function findOneBySomeField($value): ?GazPlus20
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param int $clientId
     * @param string $token
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findLastByClient(int $clientId, string $token)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.client = :clientId')
            ->andWhere('g.tokenToConfirmAuthorization = :token')
            ->andWhere('g.isAlreadyAuthorized IS NULL OR g.isAlreadyAuthorized = 0')
            ->setParameter('clientId', $clientId)
            ->setParameter('token', $token)
            ->setMaxResults(1)
            ->orderBy('g.id', 'desc')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
