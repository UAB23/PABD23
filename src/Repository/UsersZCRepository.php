<?php

namespace App\Repository;

use App\Entity\UsersZC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersZC>
 *
 * @method UsersZC|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersZC|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersZC[]    findAll()
 * @method UsersZC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersZCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersZC::class);
    }

    public function save(UsersZC $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UsersZC $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
