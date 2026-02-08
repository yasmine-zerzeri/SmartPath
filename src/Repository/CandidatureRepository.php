<?php

namespace App\Repository;

use App\Entity\Candidature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Candidature>
 */
class CandidatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidature::class);
    }

    /**
     * Trouver les candidatures d'un étudiant
     */
    public function findByEtudiant(int $etudiantId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.etudiant = :etudiant')
            ->setParameter('etudiant', $etudiantId)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les candidatures d'une offre
     */
    public function findByOffre(int $offreId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.offre = :offre')
            ->setParameter('offre', $offreId)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les candidatures par statut
     */
    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.statut = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
