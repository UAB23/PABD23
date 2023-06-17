<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;


class MoviesController extends AbstractController
{
    #[Route('/movies_add_hardcoded', name: 'app_movies')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $movie = new Movie();
        $movie->setTitlu("Spiderman");
        $movie->setDescriere("This is a great movie with my favorite superhero!");
        $movie->setPretBilet(32);
        $movie->setLocatie('Cnema City - Campeni');
        $movie->setData(new \DateTime());   
        $entityManager->persist($movie);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new movie with id '.$movie->getId());

        // return $this->render('movies/index.html.twig', [
        //     'controller_name' => 'MoviesController',
        // ]);
    }

    #[Route('/movies', name: 'movie_show')]
    public function show(MovieRepository $movieRepository): Response
    {
        
        return $this->render('movies/movies_index.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'movie_add', methods: ['GET', 'POST'])]
    public function new(Request $request, MovieRepository $movieRepository): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $movieRepository->save($movie, true);

            return $this->redirectToRoute('movie_show', [], Response::HTTP_SEE_OTHER);
        }
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->renderForm('movies/new.html.twig', [
            'movie' => $movie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'movie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Movie $movie, MovieRepository $movieRepository): Response
    {
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $movieRepository->save($movie, true);
            return $this->redirectToRoute('movie_show', [], Response::HTTP_SEE_OTHER);
        }
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->renderForm('movies/edit.html.twig', [
            'movie' => $movie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'movie_delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, Movie $movie, MovieRepository $movieRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $movieRepository->remove($movie, true);
        return $this->redirectToRoute('movie_show', [], Response::HTTP_SEE_OTHER);
    }
}
