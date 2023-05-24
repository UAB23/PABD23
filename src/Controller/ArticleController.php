<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{

    private $entityManager;

        public function __construct(ObjectManager $entityManager)
        {
            $this->entityManager = $entityManager;
        }

    /**
        * @Route("/PaulPaul", name="app_homepage")
        */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findBy([], ['createdAt' => 'DESC']);

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }


public function create(Request $request, UserInterface $user)
{
    $article = new Article();
    $article->setAuthor($user);

    $form = $this->createForm(ArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        return $this->redirectToRoute('app_homepage');
    }

    return $this->render('article/create.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
