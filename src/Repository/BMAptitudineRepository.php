<?php

namespace App\Repository;

use App\Entity\BMAptitudine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BMAptitudine>
 *
 * @method BMAptitudine|null find($id, $lockMode = null, $lockVersion = null)
 * @method BMAptitudine|null findOneBy(array $criteria, array $orderBy = null)
 * @method BMAptitudine[]    findAll()
 * @method BMAptitudine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BMAptitudineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BMAptitudine::class);
    }

    public function save(BMAptitudine $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BMAptitudine $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BMAptitudine[] Returns an array of BMAptitudine objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BMAptitudine
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
