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

class UserBlogController extends AbstractController
{
    #[Route('/user-blog', name: 'app_user_blog')]

 public function new(Request $request, ManagerRegistry $doctrine): Response
   {
   $entityManager = $doctrine->getManager();

     $user = new UserBlog();
     # Add form fields
       $form = $this->createFormBuilder($user)
       ->add('name', TextType::class,
       array('label'=> 'Name author', 'attr' =>
       array('class' => 'form-control', 'style' => 'margin-left:21px; margin-bottom:30px; width:300px')))
       ->add('profession', TextType::class,
       array('label'=> 'Profession author','attr' =>
       array('class' => 'form-control', 'style' => 'margin-left:5px; margin-bottom:30px; width:300px')))
       ->add('title', TextType::class,
       array('label'=> 'Article Name','attr' =>
       array('class' => 'form-control', 'style' => 'margin-left:19px; margin-bottom:30px; width:300px')))
       ->add('message', TextareaType::class,
       array('label'=> 'Comment','attr' =>
       array('class' => 'form-control','style' => 'margin-left:10px; width:300px; height:200px')))
       ->add('Save', SubmitType::class, array('label'=> 'Save', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px; margin-left:100px; text-align:center')))
       ->getForm();
     # Handle form response
       $form->handleRequest($request);

            if($form -> isSubmitted() && $form -> isValid()){
            $name = $form['name']->getData();
            $profession = $form['profession']->getData();
            $title = $form['title']->getData();
            $message = $form['message']->getData();

            $user ->setName($name);
            $user ->setProfession($profession);
            $user ->setTitle($title);
            $user ->setMessage($message);


            $entityManager ->persist($user);
            $entityManager ->flush();


            }
             return $this->renderForm('user_blog/index.html.twig', [
                          'controller_name' => 'UserBlogController',
                           'owner' => 'Basim Hammad',
                           'form' => $form,

             ]);
        }

}