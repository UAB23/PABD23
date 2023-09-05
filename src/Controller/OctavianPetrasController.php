<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OctavianPetrasController extends AbstractController
{
    #[Route('/octavian')]
    public function octavian()
    {
        return $this->render('octavian.html.twig');
    }
}
