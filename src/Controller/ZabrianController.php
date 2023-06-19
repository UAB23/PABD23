<?php

namespace App\Controller;

use App\Repository\BlogZCRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZabrianController extends AbstractController
{

    private $em;
    private $blogRepository;
    public function __construct(EntityManagerInterface $em, BlogZCRepository $blogRepository) 
    {
        $this->em = $em;
        $this->blogRepository = $blogRepository;
    }


    #[Route('/ZabrianCristian', name: 'app_zabrian')]
    public function index(): Response
    {
        $blogs = $this->blogRepository->findAll();

        return $this->render('zabrian/index.html.twig', [
            'blogs' => $blogs
        ]);
    }

    #[Route('/profilezc', name: 'app_profilezc')]
    public function profilezc(): Response
    {
        return $this->render('zabrian/profile.html.twig', [
            'controller_name' => 'ZabrianController',
        ]);
    }
}
