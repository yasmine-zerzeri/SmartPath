<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/parametres')]
class ParametresController extends AbstractController
{
    #[Route('/', name: 'admin_parametres')]
    public function index(): Response
    {
        return $this->render('admin/settings.html.twig');
    }
}
