<?php

namespace App\Repository;

use App\Entity\Electricite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Electricite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Electricite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Electricite[]    findAll()
 * @method Electricite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElectriciteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Electricite::class);
    }

    // /**
    //  * @return Electricite[] Returns an array of Electricite objects
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
    public function findOneBySomeField($value): ?Electricite
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
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
        return $this->createQueryBuilder('e')
            ->andWhere('e.client = :clientId')
            ->andWhere('e.tokenToConfirmAuthorization = :token')
            ->andWhere('e.isAlreadyAuthorized IS NULL OR e.isAlreadyAuthorized = 0')
            ->setParameter('clientId', $clientId)
            ->setParameter('token', $token)
            ->setMaxResults(1)
            ->orderBy('e.id', 'desc')
            ->getQuery()
            ->getOneOrNullResult();
    }
    public function findByElectricite(){
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->getQuery();


    }
}
