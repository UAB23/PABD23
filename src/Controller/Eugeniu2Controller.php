<?php

namespace App\Controller;

use App\Entity\Eugeniu;
use App\Form\EugeniuType;
use App\Repository\EugeniuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/eugeniu2')]
class Eugeniu2Controller extends AbstractController
{
    #[Route('/', name: 'app_eugeniu2_index', methods: ['GET'])]
    public function index(EugeniuRepository $eugeniuRepository): Response
    {
        return $this->render('eugeniu2/index.html.twig', [
            'eugenius' => $eugeniuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_eugeniu2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EugeniuRepository $eugeniuRepository): Response
    {
        $eugeniu = new Eugeniu();
        $form = $this->createForm(EugeniuType::class, $eugeniu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eugeniuRepository->save($eugeniu, true);

            return $this->redirectToRoute('app_eugeniu2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('eugeniu2/new.html.twig', [
            'eugeniu' => $eugeniu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_eugeniu2_show', methods: ['GET'])]
    public function show(Eugeniu $eugeniu): Response
    {
        return $this->render('eugeniu2/show.html.twig', [
            'eugeniu' => $eugeniu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_eugeniu2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Eugeniu $eugeniu, EugeniuRepository $eugeniuRepository): Response
    {
        $form = $this->createForm(EugeniuType::class, $eugeniu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eugeniuRepository->save($eugeniu, true);

            return $this->redirectToRoute('app_eugeniu2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('eugeniu2/edit.html.twig', [
            'eugeniu' => $eugeniu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_eugeniu2_delete', methods: ['POST'])]
    public function delete(Request $request, Eugeniu $eugeniu, EugeniuRepository $eugeniuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eugeniu->getId(), $request->request->get('_token'))) {
            $eugeniuRepository->remove($eugeniu, true);
        }

        return $this->redirectToRoute('app_eugeniu2_index', [], Response::HTTP_SEE_OTHER);
    }
}
