<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmartPathController extends AbstractController
{
    #[Route('/smartpath', name: 'smartpath_home')]
    public function home(): Response
    {
        // Rediriger vers login si non connecté
        if (!$this->getUser()) {
            return $this->redirectToRoute('login');
        }
        
        return $this->render('smartpath/home.html.twig');
    }
}
