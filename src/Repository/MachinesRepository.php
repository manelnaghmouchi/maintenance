<?php

namespace App\Repository;
use App\Entity\Machines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @ORM\Entity(repositoryClass=MachinesRepository::class)
 * normalizationContext={"groups"={"machines"}},
 * denormalizationContext={"groups"={"machines"}}
 */
/**
 * @method Machines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Machines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Machines[]    findAll()
 * @method Machines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Machines::class);
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