<?php

namespace App\Repository;

use App\Entity\SubBasimForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubBasimForm>
 *
 * @method SubBasimForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubBasimForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubBasimForm[]    findAll()
 * @method SubBasimForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubBasimFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubBasimForm::class);
    }

    public function save(SubBasimForm $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SubBasimForm $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SubBasimForm[] Returns an array of SubBasimForm objects
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

//    public function findOneBySomeField($value): ?SubBasimForm
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
