<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashuserController extends AbstractController
{
    #[Route('/dashuser', name: 'app_dashuser')]
    public function index(): Response
    {
        return $this->render('dashuser/index.html.twig', [
            'controller_name' => 'DashuserController',
        ]);
    }
}
