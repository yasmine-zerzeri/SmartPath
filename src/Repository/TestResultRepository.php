<?php

namespace App\Repository;

use App\Entity\TestResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TestResult>
 */
class TestResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestResult::class);
    }

    /**
     * Trouver les résultats d'un étudiant
     */
    public function findByEtudiant(int $etudiantId): array
    {
        return $this->createQueryBuilder('tr')
            ->andWhere('tr.etudiant = :etudiant')
            ->setParameter('etudiant', $etudiantId)
            ->orderBy('tr.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les résultats d'un test
     */
    public function findByTest(int $testId): array
    {
        return $this->createQueryBuilder('tr')
            ->andWhere('tr.test = :test')
            ->setParameter('test', $testId)
            ->orderBy('tr.note', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Calculer la moyenne d'un test
     */
    public function getAverageByTest(int $testId): ?float
    {
        $result = $this->createQueryBuilder('tr')
            ->select('AVG(tr.note) as moyenne')
            ->andWhere('tr.test = :test')
            ->setParameter('test', $testId)
            ->getQuery()
            ->getSingleScalarResult();

        return $result ? (float) $result : null;
    }
}
