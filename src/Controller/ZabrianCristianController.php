<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Article;

class ZabrianCristianController extends AbstractController
{
    #[Route('/ZabrianCristian', name: 'ZabrianCristian')]
    public function index()
    {
        return $this->render('zabrian_cristian/zc_pg.html.twig');
    }

    #[Route('/ZabrianCristian/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils)
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('blog_zc');
        }

        $error = $authenticationUtils->getLastAuthenticationError();

        $username = $authenticationUtils->getLastUsername();

        return $this->render('zabrian_cristian/login.html.twig', [
            'username' => $username,
            'error' => $error,
        ]);
    }

    #[Route('/ZabrianCristian/blog', name: 'blog_zc')]
    public function blog()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('zabrian_cristian/blog.html.twig', [
            'articles' => $articles,
        ]);
    }
}
