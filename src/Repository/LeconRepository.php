<?php

namespace App\Repository;

use App\Entity\Lecon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lecon>
 */
class LeconRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lecon::class);
    }

    /**
     * Trouver les leçons d'une matière
     */
    public function findByMatiere(int $matiereId): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.matiere = :matiere')
            ->setParameter('matiere', $matiereId)
            ->orderBy('l.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les leçons d'un prof
     */
    public function findByProf(int $profId): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.prof = :prof')
            ->setParameter('prof', $profId)
            ->orderBy('l.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les dernières leçons
     */
    public function findRecent(int $limit = 10): array
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
