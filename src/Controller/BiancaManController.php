<?php

namespace App\Controller;

use App\Entity\BMAptitudine;
use App\Entity\BMUser;
use App\Form\BmAddAptitudineType;
use App\Form\BmLoginType;
use App\Form\BMLogoutType;
use App\Repository\BMAptitudineRepository;
use App\Repository\BMUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
class BiancaManController extends AbstractController
{ private $em;
    
    public function __construct(EntityManagerInterface $em) 
    {
        
        $this->em = $em;
    }

    #[Route('/bianca/man', name: 'bm_homepage')]
    public function index(BMUserRepository $bmUserRepository,SessionInterface $session): Response
    {$isLoggedIn = $session->get('isLoggedInShared');
        $user = $bmUserRepository->findOneBy(["nume"=>"Bianca Man"]);
        //  dd($user->getAptitudini());
        return $this->render('bianca_man/index.html.twig', [
            'user' => $user,'isLoggedIn'=>$isLoggedIn
        ]);
    }
    #[Route('/bianca/man/galerie')]
    public function galerie(SessionInterface $session): Response
    {$isLoggedIn = $session->get('isLoggedInShared');
        $imagini=["/BiancaMan/imagini/galerie1.jpeg","/BiancaMan/imagini/galerie2.jpeg","/BiancaMan/imagini/galerie3.jpeg","/BiancaMan/imagini/galerie4.jpeg","/BiancaMan/imagini/galerie5.jpeg","/BiancaMan/imagini/galerie6.jpeg","/BiancaMan/imagini/galerie7.jpeg","/BiancaMan/imagini/galerie8.jpeg","/BiancaMan/imagini/galerie9.jpg"];
        return $this->render('bianca_man/galerie.html.twig', [
      'imagini'=> $imagini,'isLoggedIn'=>$isLoggedIn
        ]);
    }
    #[Route('/bianca/man/login')]
    public function login(Request $request,SessionInterface $session): Response
     {
        $form=$this->createForm(BmLoginType::class);      
       
        $wrongCredentials=false;
        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid())
        { $wrongCredentials=false;
            $user=$form->getData();
            $nume=$form->get('name')->getData();
            $parola=$form->get('password')->getData();
            if($nume=="root"&&$parola=="root"){
                $session->set('isLoggedInShared', true);
           return $this->redirectToRoute('bm_homepage');
            }else{
            $wrongCredentials=true;
            }
           
        }
       
        return $this->render('bianca_man/login.html.twig', [
             'wrongCredentials'=>$wrongCredentials,
           'form'=>$form->createView()
             
        ]);
    }
    #[Route('/bianca/man/aptitudini')]
    public function aptitudini(Request $request,BMUserRepository $bmUserRepository,SessionInterface $session): Response
     {
        $isLoggedIn = $session->get('isLoggedInShared');
        $aptitudine=new BMAptitudine();
        $form=$this->createForm(BmAddAptitudineType::class,$aptitudine);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()&&$isLoggedIn)
        { 
            $data=$form->getData();
            $nume=$form->get('nume')->getData();
            $aptitudine1 = new BMAptitudine();
            $aptitudine1->setNume($nume); 
            $this->em->persist($data);
            $this->em->flush();
            $user = $bmUserRepository->findOneBy(["nume"=>"Bianca Man"]);
            $user->addAptitudini($data);
            $this->em->persist($user);
            $this->em->flush();
            return $this->redirectToRoute('bm_homepage');
        }
        return $this->render('bianca_man/aptitudini.html.twig', [           
             'form'=>$form->createView(),'isLoggedIn'=>$isLoggedIn
        ]);
    }
    #[Route('/bianca/man/logout')]
    public function logout(Request $request,SessionInterface $session): Response
     { $isLoggedIn = $session->get('isLoggedInShared');
        $form=$this->createForm(BMLogoutType::class);      
       
       
        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid())
        {
           
          
                $session->remove('isLoggedInShared');
           return $this->redirectToRoute('bm_homepage');
           
           
        }
       
        return $this->render('bianca_man/logout.html.twig', [            
           'form'=>$form->createView(),'isLoggedIn'=>$isLoggedIn
             
        ]);
    }
}
