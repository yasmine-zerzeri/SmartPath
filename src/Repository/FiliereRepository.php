<?php

namespace App\Repository;

use App\Entity\Filiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Filiere>
 */
class FiliereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Filiere::class);
    }

    /**
     * Trouver les filières par catégorie
     */
    public function findByCategorie(string $categorie): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.categorie = :categorie')
            ->setParameter('categorie', $categorie)
            ->orderBy('f.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les filières par niveau
     */
    public function findByNiveau(string $niveau): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.niveau = :niveau')
            ->setParameter('niveau', $niveau)
            ->orderBy('f.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
