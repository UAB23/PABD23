<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Imagine;
use App\Repository\CategorieForumRepository;
use App\Repository\SubcategorieForumRepository;
use App\Repository\PostareForumRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ForumCristianaController extends AbstractController
{	
	#[Route('/forum_CristianaMariaPavel')]
    public function show(CategorieForumRepository $categorieRepository, SubcategorieForumRepository $subcategorieRepository): Response
    {
        $categorii = $categorieRepository->findAll();

        if (!$categorii) {
            throw $this->createNotFoundException(
                'Nu s-au gasit categorii!'
            );
        }
		
		$subcategorii = $subcategorieRepository->findAll();

        if (!$subcategorii) {
            throw $this->createNotFoundException(
                'Nu s-au gasit subcategorii!'
            );
        }

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('forum/forum_PavelCristianaMaria.html.twig', ['categorii' => $categorii, 'subcategorii' => $subcategorii]);
    }
	
	#[Route('/getPostari', name: 'get_postari')]
	public function getPostare(PostareForumRepository $postareForumRepository, Request $request): Response
    {
		
		$postari = $postareForumRepository->findBy(
			['idSubcategorie' => $request->query->get('subcategorieId')]
		);

        $arrayCollection = array();

		foreach($postari as $item) {
			 $arrayCollection[] = array(
				 'text' => $item->getText(),
				 'data' => $item->getData()
			 );
		}

		return new JsonResponse($arrayCollection);
    }
}
