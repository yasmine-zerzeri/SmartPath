<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        // La première page est toujours le login
        return $this->redirectToRoute('login');
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        // Si déjà connecté, rediriger vers SmartPath
        if ($this->getUser()) {
            return $this->redirectToRoute('smartpath_home');
        }
        
        return $this->render('security/login.html.twig');
    }

    #[Route('/signup', name: 'signup')]
    public function signup(): Response
    {
        // Si déjà connecté, rediriger vers SmartPath
        if ($this->getUser()) {
            return $this->redirectToRoute('smartpath_home');
        }
        
        return $this->render('security/signup.html.twig');
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): Response
    {
        // Simulation de déconnexion - redirige vers login
        return $this->redirectToRoute('login');
    }
}
