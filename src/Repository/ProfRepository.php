<?php

namespace App\Repository;

use App\Entity\Prof;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Prof>
 */
class ProfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prof::class);
    }

    /**
     * Trouver les profs par spécialité
     */
    public function findBySpecialite(string $specialite): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.specialite = :specialite')
            ->setParameter('specialite', $specialite)
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
