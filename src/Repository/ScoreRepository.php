<?php

namespace App\Repository;

use App\Entity\Score;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Score>
 */
class ScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Score::class);
    }

    /**
     * Trouver les scores d'un étudiant
     */
    public function findByEtudiant(int $etudiantId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.etudiant = :etudiant')
            ->setParameter('etudiant', $etudiantId)
            ->orderBy('s.dateEvaluation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Calculer la moyenne d'un étudiant
     */
    public function getAverageByEtudiant(int $etudiantId): ?float
    {
        $result = $this->createQueryBuilder('s')
            ->select('AVG(s.note) as moyenne')
            ->andWhere('s.etudiant = :etudiant')
            ->setParameter('etudiant', $etudiantId)
            ->getQuery()
            ->getSingleScalarResult();

        return $result ? (float) $result : null;
    }

    /**
     * Trouver les scores d'une matière
     */
    public function findByMatiere(int $matiereId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.matiere = :matiere')
            ->setParameter('matiere', $matiereId)
            ->orderBy('s.dateEvaluation', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
