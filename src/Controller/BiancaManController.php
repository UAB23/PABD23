<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BiancaManController extends AbstractController
{
    #[Route('/bianca/man', name: 'app_bianca_man')]
    public function index(): Response
    {
        return $this->render('bianca_man/index.html.twig', [
            'controller_name' => 'BiancaManController',
        ]);
    }
}
