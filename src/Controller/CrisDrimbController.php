<?php
// src/Controller/LuckyController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CrisDrimbController extends AbstractController
{
    public function main(): Response
    {

        return $this->render('crisd.html.twig');
    }
}