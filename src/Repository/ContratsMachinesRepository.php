<?php

namespace App\Repository;
use App\Entity\ContratsMachines;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContratsMachines|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratsMachines|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratsMachines[]    findAll()
 * @method ContratsMachines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratsMachinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContratsMachines::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}