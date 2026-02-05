<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller for public pages (no authentication required)
 */
class PublicController extends AbstractController
{
    /**
     * Home page
     */
    #[Route('/', name: 'public_home')]
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
}
