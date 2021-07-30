<?php

namespace App\Repository;

use App\Entity\Client;
use App\Entity\Electricite;
use App\Entity\Gaz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function findBySocialResion(?string $term)
    {

        $query = $this->createQueryBuilder('c')
                      ->leftJoin(Gaz::class, 'g', 'g.client = c.id')
                      ->leftJoin(Electricite::class, 'e', 'e.client = c.id')
                      ->where('c.social_reason like :val');

        for ($i = 1; $i <= 20; $i++) {
            $query->orWhere("c.PDL$i like :val")->orWhere("c.PCE$i like :val");
        }
        $query->setParameter('val', "%{$term}%")
              ->orderBy('c.id', 'DESC');

        return $query;
    }

    // /**
    //  * @return Client[] Returns an array of Client objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Client
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
