<?php

namespace App\Repository;

use App\Entity\QuizResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuizResult>
 */
class QuizResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizResult::class);
    }

    /**
     * Trouver les résultats d'un étudiant
     */
    public function findByEtudiant(int $etudiantId): array
    {
        return $this->createQueryBuilder('qr')
            ->andWhere('qr.etudiant = :etudiant')
            ->setParameter('etudiant', $etudiantId)
            ->orderBy('qr.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver le dernier résultat d'un étudiant
     */
    public function findLatestByEtudiant(int $etudiantId): ?QuizResult
    {
        return $this->createQueryBuilder('qr')
            ->andWhere('qr.etudiant = :etudiant')
            ->setParameter('etudiant', $etudiantId)
            ->orderBy('qr.createdAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
