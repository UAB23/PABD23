<?php

namespace App\Controller;

use App\Entity\BlogComment;
use App\Form\BlogCommentType;
use App\Repository\BlogCommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blog/comment')]
class BlogCommentController extends AbstractController
{
    #[Route('/', name: 'app_blog_comment_index', methods: ['GET'])]
    public function index(BlogCommentRepository $blogCommentRepository): Response
    {
        return $this->render('blog_comment/index.html.twig', [
            'blog_comments' => $blogCommentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_blog_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BlogCommentRepository $blogCommentRepository): Response
    {
        $blogComment = new BlogComment();
        $form = $this->createForm(BlogCommentType::class, $blogComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $blogCommentRepository->save($blogComment, true);

            return $this->redirectToRoute('app_blog_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blog_comment/new.html.twig', [
            'blog_comment' => $blogComment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blog_comment_show', methods: ['GET'])]
    public function show(BlogComment $blogComment): Response
    {
        return $this->render('blog_comment/show.html.twig', [
            'blog_comment' => $blogComment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_blog_comment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BlogComment $blogComment, BlogCommentRepository $blogCommentRepository): Response
    {
        $form = $this->createForm(BlogCommentType::class, $blogComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $blogCommentRepository->save($blogComment, true);

            return $this->redirectToRoute('app_blog_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blog_comment/edit.html.twig', [
            'blog_comment' => $blogComment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blog_comment_delete', methods: ['POST'])]
    public function delete(Request $request, BlogComment $blogComment, BlogCommentRepository $blogCommentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogComment->getId(), $request->request->get('_token'))) {
            $blogCommentRepository->remove($blogComment, true);
        }

        return $this->redirectToRoute('app_blog_comment_index', [], Response::HTTP_SEE_OTHER);
    }
}
