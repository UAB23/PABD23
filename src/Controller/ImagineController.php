<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
	
	#[Route('/administrareGalerie_CristianaMariaPavel')]
    public function manageGallery(ImagineRepository $imagineRepository): Response
    {
        $imagini = $imagineRepository->findAll();

        if (!$imagini) {
            throw $this->createNotFoundException(
                'Nu s-au gasit imagini!'
            );
        }

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('imagine/administrareGalerie_CristianaMariaPavel.html.twig', ['imagini' => $imagini]);
    }
	
	#[Route('/updateImagine', name: 'update_imagine')]
    public function updateImagine(ImagineRepository $imagineRepository, Request $request): Response
    {
        $imagine = $imagineRepository->find($request->query->get('id'));

        if (!$imagine) {
            throw $this->createNotFoundException(
                'Nu s-a gasit imaginea!'
            );
        }

        $imagine->setNume($request->query->get('nume'));
		$imagineRepository->save($imagine, true);
        return new Response('Imagine actualizată cu succes!');
    }
	
	#[Route('/deleteImagine', name: 'delete_imagine')]
    public function deleteImagine(ImagineRepository $imagineRepository, Request $request): Response
    {
        $imagine = $imagineRepository->find($request->query->get('id'));

        if (!$imagine) {
            throw $this->createNotFoundException(
                'Nu s-a gasit imaginea!'
            );
        }
		$imagineRepository->remove($imagine, true);
        return new Response('Imagine ștearsă cu succes!');
    }
	
	#[Route('/saveImagine', name: 'save_imagine')]
    public function saveImagine(ImagineRepository $imagineRepository, Request $request): Response
    {
        $imagine = new Imagine();
		$imagine->setNume($request->query->get('nume'));
		$imagine->setDescriere($request->query->get('descriere'));
        
        $imagineRepository->save($imagine, true);
        return new Response('Imagine salvată cu succes!');
    }
}
