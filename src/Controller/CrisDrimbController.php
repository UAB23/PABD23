<?php
// src/Controller/LuckyController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Hike;
use App\Form\HikeType;
use App\Repository\HikeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crisdrimb')]
class CrisDrimbController extends AbstractController
{
    // public function main(): Response
    // {
    //     $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
    //     return $this->render('crisd.html.twig');
    // }
    #[Route('/', name: 'app_hike_index', methods: ['GET'])]
    public function index(HikeRepository $hikeRepository): Response
    {
        return $this->render('crisd.html.twig', [
            'hikes' => $hikeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_hike_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HikeRepository $hikeRepository): Response
    {
        $hike = new Hike();
        $form = $this->createForm(HikeType::class, $hike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hikeRepository->save($hike, true);

            return $this->redirectToRoute('app_hike_index', [], Response::HTTP_SEE_OTHER);
        }
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->renderForm('hike/new.html.twig', [
            'hike' => $hike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hike_show', methods: ['GET'])]
    public function show(Hike $hike): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('hike/show.html.twig', [
            'hike' => $hike,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_hike_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hike $hike, HikeRepository $hikeRepository): Response
    {
        $form = $this->createForm(HikeType::class, $hike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hikeRepository->save($hike, true);
            return $this->redirectToRoute('app_hike_index', [], Response::HTTP_SEE_OTHER);
        }
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->renderForm('hike/edit.html.twig', [
            'hike' => $hike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_hike_delete', methods: ['POST'])]
    public function delete(Request $request, Hike $hike, HikeRepository $hikeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if ($this->isCsrfTokenValid('delete'.$hike->getId(), $request->request->get('_token'))) {
            $hikeRepository->remove($hike, true);
        }
        return $this->redirectToRoute('app_hike_index', [], Response::HTTP_SEE_OTHER);
    }
}