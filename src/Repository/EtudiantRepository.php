<?php

namespace App\Repository;

use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etudiant>
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    /**
     * Trouver les étudiants par niveau
     */
    public function findByNiveau(string $niveau): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.niveau = :niveau')
            ->setParameter('niveau', $niveau)
            ->orderBy('e.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les étudiants d'une filière
     */
    public function findByFiliere(int $filiereId): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.filiere = :filiere')
            ->setParameter('filiere', $filiereId)
            ->orderBy('e.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
