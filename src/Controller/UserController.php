<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
	
	#[Route('/paginaDinamica_CristianaMariaPavel')]
    public function show(UserRepository $userRepository): Response
    {
        $user = $userRepository->find(1);

        if (!$user) {
            throw $this->createNotFoundException(
                'Nu s-au gasit utilizatori!'
            );
        }

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('paginaDinamica/paginaDinamica_CristianaMariaPavel.html.twig', ['user' => $user]);
    }
	
	#[Route('/findUserUsername', name: 'find_user_username')]
    public function findUserUsername(UserRepository $userRepository): Response
    {
        $user = $userRepository->find(1);
		
		if (!$user) {
            throw $this->createNotFoundException(
                'Nu s-a gasit utilizatorul!'
            );
        }
		
        return new Response($user->getUsername());
    }
	
	#[Route('/findUserParola', name: 'find_user_parola')]
    public function findUserParola(UserRepository $userRepository): Response
    {
        $user = $userRepository->find(1);
		
		if (!$user) {
            throw $this->createNotFoundException(
                'Nu s-a gasit utilizatorul!'
            );
        }
		
        return new Response($user->getParola());
    }
	
	#[Route('/updateDescriere', name: 'update_descriere')]
    public function updateDescriere(UserRepository $userRepository, Request $request): Response
    {
        $user = $userRepository->find(1);

        if (!$user) {
            throw $this->createNotFoundException(
                'Nu s-au gasit utilizatori!'
            );
        }

        $user->setDescriere($request->query->get('descriere'));
		$userRepository->save($user, true);
        return new Response('Descriere actualizată cu succes!');
    }
}
