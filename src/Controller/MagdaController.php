<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MagdaController extends AbstractController
{
    #[Route('/Magda')]
    public function Magda()
    {
        return $this->render('Magda.html.twig');
    }
}
