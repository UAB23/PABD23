<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaulRaduController extends AbstractController
{
    
    #[Route('/PaulRadu')]
     
    public function index(): Response
    {
        $data = [
            'name' => 'Paul George Radu',
            'email' => 'radupaulgeorge@gmail.com',
            'location' => 'Alba Iulia',
            'bio' => 'Masterand in anul 2 la specialitatea Programare avansata si baze de date',
            'about_me' => 'Masterand in anul 2 la specialitatea Programare avansata si baze de date',
            'skills' => ['C#', '.Net Core', 'HTML', 'CSS', 'JavaScript'],
        ];

        return $this->render('PaulRadu/PaulRadu.html.twig', $data);
    }

    #[Route('/PaulRadu/create')]
    public function create(): Response
    {
        return $this->render('PaulRadu/PaulRaduForm.html.twig');
    }

    public function createDb(Request $request)
    {
        $pgrData = new PgrDataDB();

        $form = $this->createForm(PgrDataDBType::class, $pgrData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Process the form data and save the entity
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pgrData);
            $entityManager->flush();

            // Redirect to a success page or do something else

            // Example redirect:
            return $this->redirectToRoute('PaulRadu.html.twig');
        }

        return $this->render('PaulRaduForm.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}


