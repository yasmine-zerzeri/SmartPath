<?php

namespace App\Repository;

use App\Entity\Test;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Test>
 */
class TestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test::class);
    }

    /**
     * Trouver les tests d'un prof
     */
    public function findByProf(int $profId): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.prof = :prof')
            ->setParameter('prof', $profId)
            ->orderBy('t.dateTest', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les tests d'une matière
     */
    public function findByMatiere(int $matiereId): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.matiere = :matiere')
            ->setParameter('matiere', $matiereId)
            ->orderBy('t.dateTest', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les tests à venir
     */
    public function findUpcoming(): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.dateTest >= :today')
            ->setParameter('today', new \DateTime())
            ->orderBy('t.dateTest', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
