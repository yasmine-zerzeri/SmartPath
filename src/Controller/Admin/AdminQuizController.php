<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/quiz')]
class AdminQuizController extends AbstractController
{
    #[Route('/', name: 'admin_quiz')]
    public function index(): Response
    {
        return $this->render('admin/quiz/index.html.twig');
    }
}
