<?php

namespace App\Repository;

use App\Entity\CategoriesForumDb1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoriesForumDb1>
 *
 * @method CategoriesForumDb1|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesForumDb1|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesForumDb1[]    findAll()
 * @method CategoriesForumDb1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesForumDb1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesForumDb1::class);
    }

    public function save(CategoriesForumDb1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoriesForumDb1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategoriesForumDb1[] Returns an array of CategoriesForumDb1 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategoriesForumDb1
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
