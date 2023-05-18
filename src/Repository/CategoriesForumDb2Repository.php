<?php

namespace App\Repository;

use App\Entity\CategoriesForumDb2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoriesForumDb2>
 *
 * @method CategoriesForumDb2|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesForumDb2|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesForumDb2[]    findAll()
 * @method CategoriesForumDb2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesForumDb2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesForumDb2::class);
    }

    public function save(CategoriesForumDb2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoriesForumDb2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategoriesForumDb2[] Returns an array of CategoriesForumDb2 objects
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

//    public function findOneBySomeField($value): ?CategoriesForumDb2
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
