<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/stages')]
class AdminStagesController extends AbstractController
{
    #[Route('/', name: 'admin_stages')]
    public function index(): Response
    {
        return $this->render('admin/stages/index.html.twig');
    }
}
