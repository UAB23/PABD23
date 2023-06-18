<?php

namespace App\Controller;

use App\Entity\Sports;
use App\Form\SportsType;
use App\Repository\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sports')]
class SportsController extends AbstractController
{
    #[Route('/', name: 'app_sports_index', methods: ['GET'])]
    public function index(SportsRepository $sportsRepository): Response
    {
        return $this->render('sports/index.html.twig', [
            'sports' => $sportsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sports_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SportsRepository $sportsRepository): Response
    {
        $sport = new Sports();
        $form = $this->createForm(SportsType::class, $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sportsRepository->save($sport, true);

            return $this->redirectToRoute('app_sports_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sports/new.html.twig', [
            'sport' => $sport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sports_show', methods: ['GET'])]
    public function show(Sports $sport): Response
    {
        return $this->render('sports/show.html.twig', [
            'sport' => $sport,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sports_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sports $sport, SportsRepository $sportsRepository): Response
    {
        $form = $this->createForm(SportsType::class, $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sportsRepository->save($sport, true);

            return $this->redirectToRoute('app_sports_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sports/edit.html.twig', [
            'sport' => $sport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sports_delete', methods: ['POST'])]
    public function delete(Request $request, Sports $sport, SportsRepository $sportsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sport->getId(), $request->request->get('_token'))) {
            $sportsRepository->remove($sport, true);
        }

        return $this->redirectToRoute('app_sports_index', [], Response::HTTP_SEE_OTHER);
    }
}
