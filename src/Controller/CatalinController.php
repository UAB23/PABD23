<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class CatalinController extends AbstractController
{
    #[Route('/catalin')]
    public function list(): Response
    {
        return $this->render('catalin/dinamicPage.twig', [
            'controller_name' => 'CatalinController',
        ]);
    }

    #[Route('/catalin/homepage',name: 'homepage')]
    public function homepage(ArticleRepository $articleRepository): Response
    {
        $articole=$articleRepository->findAll();
    
        return $this->render('catalin/homepage.twig',['articole'=>$articole,'controller_name' => 'Catalin','authenticated' => '0',]);
    }

    #[Route('/catalin/login',name: 'login')]
    public function login(ArticleRepository $articleRepository,$user,$password): Response
    {   
        $articole=$articleRepository->findAll();
        if($user=='catalin' && $password=='catalin123')
            return $this->render('catalin/homepage.twig',['articole'=>$articole,'controller_name' => 'Catalin','authenticated' => '1',]);

        return $this->render('catalin/homepage.twig',['articole'=>$articole,'controller_name' => 'Catalin','authenticated' => '0',]);
        
    }



    #[Route('/catalin/createArticle', name: 'createArticle')]
    public function createArticle(Request $request,ArticleRepository $articleRepository): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleRepository->save($article, true);

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('catalin/createArticle.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }
}
