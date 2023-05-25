<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BolojanController extends AbstractController {
    #[Route('/bolojan')]
    public function presentUser() {
        return $this->render('bolojan_mihai.html.twig');
    }
}
