<?php

namespace App\Repository;

use App\Entity\SubcategoriesForumDb1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubcategoriesForumDb1>
 *
 * @method SubcategoriesForumDb1|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubcategoriesForumDb1|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubcategoriesForumDb1[]    findAll()
 * @method SubcategoriesForumDb1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubcategoriesForumDb1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubcategoriesForumDb1::class);
    }

    public function save(SubcategoriesForumDb1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SubcategoriesForumDb1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SubcategoriesForumDb1[] Returns an array of SubcategoriesForumDb1 objects
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

//    public function findOneBySomeField($value): ?SubcategoriesForumDb1
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
