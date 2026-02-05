<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StagesController extends AbstractController
{
    #[Route('/smartpath/stages', name: 'stages')]
    public function index(): Response
    {
        // Rediriger vers login si non connecté
        if (!$this->getUser()) {
            return $this->redirectToRoute('public_login');
        }
        
        return $this->render('stages/index.html.twig');
    }
}
