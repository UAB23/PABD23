<?php

namespace App\Repository;

use App\Entity\CategoriesForumBD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoriesForumBD>
 *
 * @method CategoriesForumBD|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesForumBD|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesForumBD[]    findAll()
 * @method CategoriesForumBD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesForumBDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesForumBD::class);
    }

    public function save(CategoriesForumBD $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoriesForumBD $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategoriesForumBD[] Returns an array of CategoriesForumBD objects
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

//    public function findOneBySomeField($value): ?CategoriesForumBD
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
