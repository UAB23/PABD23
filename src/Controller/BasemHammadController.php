<?php
// src/Controller/BasemHammadController.php
namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BasemHammadController extends AbstractController
{
    #[Route('/BasemHammad')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('BasemHammad/index.html.twig', [
            'owner' => 'Basem Hammad',
            'job' => 'we developer',
            'age' => $this->getAge(),
            'copyrightInterval' => $this->getCopyrightInterval(),
        ]);

    }
    private function getAge(): int
        {
            $now = new DateTime("now");
            $dob = new DateTime("1997-02-12 00:00:00");
            return $dob->diff($now)->y;
        }
    private function getCopyrightInterval(): string
        {
            $start = 2023;
            $end = date('Y');
            return ($end > $start) ? "$start - $end" : $start;
        }
}