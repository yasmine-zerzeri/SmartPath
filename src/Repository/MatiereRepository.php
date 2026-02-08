<?php

namespace App\Repository;

use App\Entity\Matiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Matiere>
 */
class MatiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matiere::class);
    }

    /**
     * Trouver les matières d'une filière
     */
    public function findByFiliere(int $filiereId): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.filiere = :filiere')
            ->setParameter('filiere', $filiereId)
            ->orderBy('m.titre', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les matières d'un prof
     */
    public function findByProf(int $profId): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.prof = :prof')
            ->setParameter('prof', $profId)
            ->orderBy('m.titre', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
