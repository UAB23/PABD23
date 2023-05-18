<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaginaPersonalaController extends AbstractController
{
    #[Route('/paginaPersonala')]
    public function paginaPersonala()
    {
        return $this->render('paginaPersonala.html.twig');
    }
}
