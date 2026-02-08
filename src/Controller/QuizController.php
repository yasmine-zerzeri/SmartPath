<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuizResult;
use App\Entity\Etudiant;
use App\Repository\QuestionRepository;
use App\Repository\QuizResultRepository;
use App\Repository\EtudiantRepository;
use App\Service\QuizAnalyzer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/quiz')]
class QuizController extends AbstractController
{
    public function __construct(
        private QuizAnalyzer $quizAnalyzer,
        private EntityManagerInterface $entityManager
    ) {}

    /**
     * Page d'accueil du quiz
     */
    #[Route('/', name: 'app_quiz_index')]
    public function index(): Response
    {
        return $this->render('quiz/index.html.twig');
    }

    /**
     * Page de démarrage du quiz (formulaire d'informations)
     */
    #[Route('/start', name: 'app_quiz_start')]
    public function start(): Response
    {
        return $this->render('quiz/start.html.twig');
    }

    /**
     * Page du quiz avec toutes les questions
     */
    #[Route('/questions', name: 'app_quiz_questions')]
    public function quiz(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAllOrdered();

        return $this->render('quiz/quiz.html.twig', [
            'questions' => $questions,
        ]);
    }

    /**
     * Soumission du quiz et analyse des résultats
     */
    #[Route('/submit', name: 'app_quiz_submit', methods: ['POST'])]
    public function submit(Request $request, EtudiantRepository $etudiantRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Récupérer ou créer l'étudiant
        $etudiant = null;
        if (isset($data['etudiantId'])) {
            $etudiant = $etudiantRepository->find($data['etudiantId']);
        }

        // Analyser les réponses
        $analysis = $this->quizAnalyzer->analyzeResponses($data['responses']);

        // Créer le résultat du quiz
        $quizResult = new QuizResult();
        $quizResult->setEtudiant($etudiant);
        $quizResult->setResponses($data['responses']);
        $quizResult->setScores($analysis['scores']);
        $quizResult->setProfileType($analysis['profileType']);
        $quizResult->setRecommendations($analysis['recommendations']);

        $this->entityManager->persist($quizResult);
        $this->entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'resultId' => $quizResult->getId(),
        ]);
    }

    /**
     * Affichage des résultats du quiz
     */
    #[Route('/result/{id}', name: 'app_quiz_result')]
    public function result(QuizResult $quizResult): Response
    {
        return $this->render('quiz/result.html.twig', [
            'result' => $quizResult,
        ]);
    }

    /**
     * Historique des quiz d'un étudiant
     */
    #[Route('/history/{etudiantId}', name: 'app_quiz_history')]
    public function history(int $etudiantId, QuizResultRepository $quizResultRepository): Response
    {
        $results = $quizResultRepository->findByEtudiant($etudiantId);

        return $this->render('quiz/history.html.twig', [
            'results' => $results,
        ]);
    }
}
