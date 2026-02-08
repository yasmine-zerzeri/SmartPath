<?php

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Question>
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    /**
     * Récupérer toutes les questions dans l'ordre
     */
    public function findAllOrdered(): array
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.ordre', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les questions par catégorie
     */
    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.category = :category')
            ->setParameter('category', $category)
            ->orderBy('q.ordre', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
