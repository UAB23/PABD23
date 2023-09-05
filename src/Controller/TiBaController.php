<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TiBaController extends AbstractController
{
    #[Route('/TiBa')]
    public function TiBaController()
    {
        return $this->render('bartha_tiberiu/TiBa.html.twig');
    }
}
