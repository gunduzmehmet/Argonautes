<?php

namespace App\Repository;

use App\Entity\Equipages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipages[]    findAll()
 * @method Equipages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipages::class);
    }

    // /**
    //  * @return Equipages[] Returns an array of Equipages objects
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
    public function findOneBySomeField($value): ?Equipages
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
