<?php

namespace App\Controller;


use App\Repository\BlogZCRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogZCController extends AbstractController
{

    private $em;
    private $blogRepository;
    public function __construct(EntityManagerInterface $em, BlogZCRepository $blogRepository) 
    {
        $this->em = $em;
        $this->blogRepository = $blogRepository;
    }


    #[Route('/blog/z/c', name: 'app_blog_z_c')]
    public function index(): Response
    {
        $blogs = $this->blogRepository->findAll();

        return $this->render('blog_zc/index.html.twig', [
            // 'controller_name' => 'BlogZCController',
            'blogs' => $blogs
        ]);
    }
}
