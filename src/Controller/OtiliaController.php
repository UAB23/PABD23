<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OtiliaController extends AbstractController
{
    #[Route('/otilia')]
    public function otilia()
    {
        return $this->render('otilia.html.twig');
    }
}
