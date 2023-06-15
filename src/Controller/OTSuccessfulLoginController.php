<?php
// src/Controller/SuccessfulLoginController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OTSuccessfulLoginController extends AbstractController
{
    /**
     * @Route("/successful-login", name="successful_login")
     */
    public function successfulLogin(): Response
    {
        return $this->render('successfulLogin.html.twig');
    }
}