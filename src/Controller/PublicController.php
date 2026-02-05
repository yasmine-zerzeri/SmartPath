<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller for public pages (no authentication required - templates only)
 */
class PublicController extends AbstractController
{
    /**
     * Login & Sign Up page (landing page at 127.0.0.1:8000)
     */
    #[Route('/', name: 'public_login')]
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * Sign Up page
     */
    #[Route('/signup', name: 'public_signup')]
    public function signup(): Response
    {
        return $this->render('security/signup.html.twig');
    }

    /**
     * Home page (dashboard after login - accessible at /home)
     */
    #[Route('/home', name: 'public_home')]
    public function home(): Response
    {
        return $this->render('public/home.html.twig');
    }

    /**
     * Courses catalog page
     */
    #[Route('/courses', name: 'public_courses')]
    public function courses(): Response
    {
        return $this->render('public/courses.html.twig');
    }

    /**
     * About page
     */
    #[Route('/about', name: 'public_about')]
    public function about(): Response
    {
        return $this->render('public/about.html.twig');
    }

    /**
     * Contact page
     */
    #[Route('/contact', name: 'public_contact')]
    public function contact(): Response
    {
        return $this->render('public/contact.html.twig');
    }

    /**
     * Quiz page
     */
    #[Route('/quiz', name: 'public_quiz')]
    public function quiz(): Response
    {
        return $this->render('quiz/index.html.twig');
    }

    /**
     * Internship/Stage page
     */
    #[Route('/stage', name: 'public_stage')]
    public function stage(): Response
    {
        return $this->render('stages/index.html.twig');
    }

    /**
     * Profile page
     */
    #[Route('/profile', name: 'public_profile')]
    public function profile(): Response
    {
        return $this->render('profil/index.html.twig');
    }
}
