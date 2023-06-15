<?php
// src/Controller/DashboardController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OTDashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        // Add any necessary logic to retrieve data for the dashboard
        
        return $this->render('index.html.twig', [
            // Pass any data needed by the template
        ]);
    }
}