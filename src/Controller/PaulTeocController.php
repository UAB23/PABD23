<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaulTeocController extends AbstractController
{
    #[Route('/PTeoc')]
    public function teoc()
    {
        return $this->render('TeocPaul/index.html.twig');
    }
}
