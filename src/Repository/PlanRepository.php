<?php

namespace App\Repository;

use App\Entity\Plan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plan>
 */
class PlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plan::class);
    }

    /**
     * Trouver les plans d'un prof
     */
    public function findByProf(int $profId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.prof = :prof')
            ->setParameter('prof', $profId)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les plans d'une filière
     */
    public function findByFiliere(int $filiereId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.filiere = :filiere')
            ->setParameter('filiere', $filiereId)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
