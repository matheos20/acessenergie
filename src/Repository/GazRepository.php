<?php

namespace App\Repository;

use App\Entity\Gaz;
use App\Entity\GazRecherche;
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

    /***
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

    public function findByGaz(?string $recherche = null, ?int $userId = null)
    {
        $query = $this->createQueryBuilder('g')
            ->leftJoin('g.client', 'c')
            ->leftJoin('c.user', 'u');
        if ($userId) {
            $query->where('u.id = :userId')->setParameter('userId', $userId);
        }
        if ($recherche){
            $ex = $query->expr()->orX();
            for ($i = 1; $i <= 20; $i++) {
                $ex->add("g.PCE$i like :val");
            }
            $query->andWhere($ex);
            $query->setParameter('val', "%{$recherche}%");
        }
        return $query->orderBy('g.id', 'DESC')->getQuery();
    }

    public function searchByTerms(array $terms)
    {
        $query = $this->createQueryBuilder('g');
        $j = 0;
        foreach ($terms as $term) {
            for ($i = 1; $i <= 20; $i++) {
                $query->orWhere("g.PCE$i like :term$j");
            }
            $query->setParameter("term$j", "%{$term}%");
            $j++;
        }

        return $query->andWhere('g.horodatage IS NOT NULL')->orderBy('g.id', 'DESC')->getQuery();
    }
}
