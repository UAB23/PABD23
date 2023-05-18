<?php

namespace App\Repository;

use App\Entity\SubcategoriesForumDB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubcategoriesForumDB>
 *
 * @method SubcategoriesForumDB|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubcategoriesForumDB|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubcategoriesForumDB[]    findAll()
 * @method SubcategoriesForumDB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubcategoriesForumDBRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubcategoriesForumDB::class);
    }

    public function save(SubcategoriesForumDB $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SubcategoriesForumDB $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SubcategoriesForumDB[] Returns an array of SubcategoriesForumDB objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SubcategoriesForumDB
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
