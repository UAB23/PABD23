<?php

namespace App\Repository;

use App\Entity\ActivitateDidacticaDB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActivitateDidacticaDB>
 *
 * @method ActivitateDidacticaDB|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivitateDidacticaDB|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivitateDidacticaDB[]    findAll()
 * @method ActivitateDidacticaDB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivitateDidacticaDBRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivitateDidacticaDB::class);
    }

    public function save(ActivitateDidacticaDB $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ActivitateDidacticaDB $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ActivitateDidacticaDB[] Returns an array of ActivitateDidacticaDB objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ActivitateDidacticaDB
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
