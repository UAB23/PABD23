<?php
// src/Controller/LoginController.php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OTLoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request): Response
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Check if the username and password are valid
            $isValidCredentials = $this->checkCredentials($data['username'], $data['password']);

            if ($isValidCredentials) {
                // Redirect to the dashboard or any other authorized page
                return $this->redirectToRoute('dashboard');
            } else {
                $error = 'Invalid credentials. Please try again.';
            }
        }

        return $this->render('login.html.twig', [
            'form' => $form->createView(),
            'error' => $error ?? null,
        ]);
    }

    private function checkCredentials(string $submittedUsername, string $submittedPassword): bool
    {
        // Query the database and check if the username/password combination exists and is valid
        // You can use Doctrine ORM or any other database library to fetch and validate the credentials
    
        // Example using hardcoded username/password (for demonstration purposes only)
        $validUsers = [
            [
                'username' => 'admin',
                'password' => 'password',
            ],
            [
                'username' => 'OneTrusted',
                'password' => '123456789',
            ],
            [
                'username' => 'oovi',
                'password' => 'onetwo',
            ],
        ];
    
        foreach ($validUsers as $validUser) {
            if ($submittedUsername === $validUser['username'] && $submittedPassword === $validUser['password']) {
                return true;
            }
        }
    
        return false;
    }
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(): Response
    {
        return $this->render('index.html.twig');
    }
}