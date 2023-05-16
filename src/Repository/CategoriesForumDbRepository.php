<?php

namespace App\Repository;

use App\Entity\CategoriesForumDb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoriesForumDb>
 *
 * @method CategoriesForumDb|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesForumDb|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesForumDb[]    findAll()
 * @method CategoriesForumDb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesForumDbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesForumDb::class);
    }

    public function save(CategoriesForumDb $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoriesForumDb $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategoriesForumDb[] Returns an array of CategoriesForumDb objects
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

//    public function findOneBySomeField($value): ?CategoriesForumDb
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
