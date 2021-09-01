<?php

namespace App\Repository;

use App\Entity\TypeHistorique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeHistorique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHistorique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHistorique[]    findAll()
 * @method TypeHistorique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHistoriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeHistorique::class);
    }

    // /**
    //  * @return TypeHistorique[] Returns an array of TypeHistorique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeHistorique
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
