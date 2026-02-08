<?php

namespace App\Service;

use App\Repository\AnswerRepository;
use App\Repository\FiliereRepository;

class QuizAnalyzer
{
    public function __construct(
        private AnswerRepository $answerRepository,
        private FiliereRepository $filiereRepository
    ) {}

    /**
     * Analyser les réponses et calculer les scores
     */
    public function analyzeResponses(array $answerIds): array
    {
        $scores = [
            'analytique' => 0,
            'pratique' => 0,
            'creatif' => 0,
            'technique' => 0,
            'mathematique' => 0,
            'algorithmique' => 0,
            'systemes' => 0,
            'reseaux' => 0,
            'securite' => 0,
            'donnees' => 0,
        ];

        // Calculer les scores pour chaque trait
        foreach ($answerIds as $answerId) {
            $answer = $this->answerRepository->find($answerId);
            if ($answer) {
                $trait = $answer->getTrait();
                if (isset($scores[$trait])) {
                    $scores[$trait] += $answer->getPoints();
                }
            }
        }

        // Déterminer le profil type
        $profileType = $this->determineProfileType($scores);

        // Recommander des filières
        $recommendations = $this->recommendFilieres($scores);

        return [
            'scores' => $scores,
            'profileType' => $profileType,
            'recommendations' => $recommendations,
        ];
    }

    /**
     * Déterminer le profil type selon les scores
     */
    private function determineProfileType(array $scores): string
    {
        $maxTrait = array_keys($scores, max($scores))[0];

        $profiles = [
            'analytique' => 'Data Analyst',
            'pratique' => 'Développeur Full Stack',
            'creatif' => 'UX/UI Designer',
            'technique' => 'Ingénieur Système',
            'mathematique' => 'Data Scientist',
            'algorithmique' => 'Expert IA/ML',
            'systemes' => 'Administrateur Système',
            'reseaux' => 'Ingénieur Réseau',
            'securite' => 'Expert Cybersécurité',
            'donnees' => 'Ingénieur Big Data',
        ];

        return $profiles[$maxTrait] ?? 'Informaticien Polyvalent';
    }

    /**
     * Recommander des filières selon les scores
     */
    private function recommendFilieres(array $scores): array
    {
        $filieres = $this->filiereRepository->findAll();
        $recommendations = [];

        foreach ($filieres as $filiere) {
            $matchScore = $this->calculateMatchScore($scores, $filiere->getTraits() ?? []);
            
            if ($matchScore > 0) {
                $recommendations[] = [
                    'filiere' => $filiere,
                    'score' => $matchScore,
                    'percentage' => min(100, $matchScore),
                ];
            }
        }

        // Trier par score décroissant
        usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);

        // Retourner le top 5
        return array_slice($recommendations, 0, 5);
    }

    /**
     * Calculer le score de correspondance entre l'étudiant et une filière
     */
    private function calculateMatchScore(array $studentScores, array $filiereTraits): int
    {
        if (empty($filiereTraits)) {
            return 0;
        }

        $totalScore = 0;
        $maxPossibleScore = 0;

        foreach ($filiereTraits as $trait => $weight) {
            $studentScore = $studentScores[$trait] ?? 0;
            $totalScore += $studentScore * $weight;
            $maxPossibleScore += 100 * $weight;
        }

        return $maxPossibleScore > 0 
            ? (int) (($totalScore / $maxPossibleScore) * 100) 
            : 0;
    }
}
