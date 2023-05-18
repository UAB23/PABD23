<?php

namespace App\Repository;

use App\Entity\ActivitateStiintificaDB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActivitateStiintificaDB>
 *
 * @method ActivitateStiintificaDB|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivitateStiintificaDB|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivitateStiintificaDB[]    findAll()
 * @method ActivitateStiintificaDB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivitateStiintificaDBRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivitateStiintificaDB::class);
    }

    public function save(ActivitateStiintificaDB $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ActivitateStiintificaDB $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ActivitateStiintificaDB[] Returns an array of ActivitateStiintificaDB objects
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

//    public function findOneBySomeField($value): ?ActivitateStiintificaDB
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
