<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoxanaDavidController extends AbstractController
{
    #[Route('/roxana')]
    public function roxana()
    {
        return $this->render('roxana.html.twig');
    }
}