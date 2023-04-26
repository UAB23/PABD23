<?php

namespace App\Controller;

use App\Entity\ImagesDB;
use App\Repository\ImagesDBRepository;
use App\Entity\ActivitateStiintificaDB;
use App\Repository\ActivitateStiintificaDBRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Form\ImagesDBFormType;
use App\Form\ActivitateStiintificaDBFormType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MariaNeculaStanController extends AbstractController
{

    #[Route('/MariaNeculaStan/index',name: 'indexMNS')]
    public function index(): Response
    {
        return $this->render('MariaNeculaStan/index.html.twig');
    }

#[Route('/MariaNeculaStan/cv-profesional',name: 'cv-profesionalMNS')]
public function MariaNeculaStan_cv(): Response
    {
        return $this->render('MariaNeculaStan/cv-profesional.html.twig');
    }

#[Route('/MariaNeculaStan/activitateDidactica',name: 'activitateaDidacticaMNS')]
public function MariaNeculaStan_activitateDidactica(): Response
    {
        return $this->render('MariaNeculaStan/activitateDidactica.html.twig');
    }
	
#[Route('/MariaNeculaStan/activitateStiintifica',name: 'activitateaStiintificaMNS')]
public function MariaNeculaStan_activitateStiintifica(): Response
    {
        return $this->render('MariaNeculaStan/activitateStiintifica.html.twig');
    }

#[Route('/MariaNeculaStan/galerie',name: 'galerieMNS')]
public function MariaNeculaStan_galerie(): Response
    {
        return $this->render('MariaNeculaStan/galerieFoto.html.twig');
    }

#[Route('/MariaNeculaStan/contact',name: 'contactMNS')]
public function MariaNeculaStan_contact(): Response
    {
        return $this->render('MariaNeculaStan/contact.html.twig');
    }
}