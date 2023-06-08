<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use App\Entity\UserBlog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ShowBlogController extends AbstractController
{
    #[Route('/show-blog/{id}', name: 'app_show_blog')]
       public function show(ManagerRegistry $doctrine, int $id): Response
          {
              $chat = $doctrine->getRepository(UserBlog::class)->find($id);

              if (!$chat) {
                  throw $this->createNotFoundException(
                      'No chat found for id '.$id
                  );
              }

              return $this->render('show_blog/show_blog.html.twig', [
                'owner' => 'Basim Hammad',
                'chat' => $chat]);
          }
}