<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EugeniuController extends AbstractController
{
    #[Route('/Eugeniu')]
    public function Eugeniu()
    {
        return $this->render('Eugeniu/Eugeniu.html.twig');
    }
}
