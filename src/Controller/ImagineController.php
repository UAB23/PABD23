<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Imagine;
use App\Repository\ImagineRepository;

class ImagineController extends AbstractController
{
    #[Route('/imagine', name: 'app_imagine')]
    public function index(): Response
    {
        return $this->render('imagine/index.html.twig', [
            'controller_name' => 'ImagineController',
        ]);
    }
	
	#[Route('/galerie_CristianaMariaPavel')]
    public function show(ImagineRepository $imagineRepository): Response
    {
        $imagini = $imagineRepository->findAll();

        if (!$imagini) {
            throw $this->createNotFoundException(
                'Nu s-au gasit imagini!'
            );
        }

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('imagine/galerie_CristianaMariaPavel.html.twig', ['imagini' => $imagini]);
    }
}
