<?php
// src/Controller/SecurityController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LoginForm; // Import the LoginForm class

class OTSecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"GET"})
     */
    public function login()
    {
        // Create an instance of the LoginForm class
        $form = $this->createForm(LoginForm::class);

        // Render the login form template
        return $this->render('login.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/login", name="app_login_post", methods={"POST"})
     */
    public function loginPost(Request $request)
    {
        // Create an instance of the LoginForm class
        $form = $this->createForm(LoginForm::class);

        // Handle form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Process the form data, validate user credentials, and perform authentication

            if ($authenticationSuccessful) {
                // Redirect the user to the desired page
                return $this->redirectToRoute('dashboard');
            } else {
                $this->addFlash('error', 'Invalid username or password');
            }
        }

        return $this->redirectToRoute('app_login');
    }
}