<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ParaipanController extends AbstractController {
    #[Route('/paraipan')]
    public function presentUser() {
        return $this->render('paraipan.html.twig');
    }
}
