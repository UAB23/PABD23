<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdelinDumbravaController extends AbstractController
{
    #[Route('/adelindumbrava')]
    public function adelindumbrava()
    {
        return $this->render('adelindumbrava.html.twig');
    }
}