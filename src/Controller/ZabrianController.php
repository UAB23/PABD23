<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZabrianController extends AbstractController
{
    #[Route('/ZabrianCristian', name: 'app_zabrian')]
    public function index(): Response
    {
        return $this->render('zabrian/index.html.twig', [
            'controller_name' => 'ZabrianController',
        ]);
    }

    #[Route('/profilezc', name: 'app_profilezc')]
    public function profilezc(): Response
    {
        return $this->render('zabrian/profile.html.twig', [
            'controller_name' => 'ZabrianController',
        ]);
    }
}
