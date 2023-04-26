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

class BibicuDorinController extends AbstractController
{
    private $actSRepository;
    private $em;
    public function __construct(EntityManagerInterface $actSRepository,EntityManagerInterface $em) 
    {
        $this->actSRepository = $actSRepository;
        $this->em = $em;
    }

    #[Route('/BibicuDorin/index',name: 'indexBD')]
    public function index(): Response
    {
        return $this->render('bibicu_dorin/index.html.twig');
    }

#[Route('/BibicuDorin/home',name: 'homeBD')]
public function Bibicu_Dorin_home(): Response
    {
        return $this->render('bibicu_dorin/index.html.twig');
    }

#[Route('/BibicuDorin/materiale',name: 'materiale_did')]
public function Bibicu_Dorin_materiale(): Response
    {
        return $this->render('bibicu_dorin/materiale.html.twig');
    }

#[Route('/BibicuDorin/galerie',name: 'galerie_img')]
public function Bibicu_Dorin_galerie(ImagesDBRepository $imagesRepository): Response
    {
        $images=$imagesRepository->findAll();
		//dd($images);
        //exit;
        //return $this->render('bibicu_dorin/base.html.twig');
        return $this->render('bibicu_dorin/galerie.html.twig',['images'=>$images]);
    }    

#[Route('/BibicuDorin/biografie',name: 'biografieBD')]
public function Bibicu_Dorin_biografie(): Response
    {
        return $this->render('bibicu_dorin/biografie.html.twig');
    }


#[Route('/BibicuDorin/activitateaStiintifica',name: 'activitateStiintificaBD')]
public function Bibicu_Dorin_activitateaStiintifica(ActivitateStiintificaDBRepository $actSRepository): Response
    {
        $actS=$actSRepository->findAll();
		//dd($actS);
        //exit;

        return $this->render('bibicu_dorin/activitateaStiintifica.html.twig',['activitatiS'=>$actS]);
    }

#[Route('/BibicuDorin/activitateaDidactica',name: 'activitateDidacticaBD')]
public function Bibicu_Dorin_activitateaDidactica(): Response
    {
        return $this->render('bibicu_dorin/activitateaDidactica.html.twig');
    }

#[Route('/BibicuDorin/contact',name: 'contactBD')]
public function Bibicu_Dorin_contact(): Response
    {
        return $this->render('bibicu_dorin/contact.html.twig');
    }

#[Route('/BibicuDorin/createImage', name: 'create_image')]
    public function createImage(Request $request): Response
    {
        //$movie = $this->movieRepository->find($id);
   

        $image = new ImagesDB();
        $form=$this->createForm(ImagesDBFormType::class,$image);//apeleaza met createForm
        //dd("sal");
        //exit;

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $newImage=$form->getData();
            $imagePath=$form->get('imagePath')->getData();
            if ($imagePath) {
                $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernel.project_dir') . '/public/BibicuDorin/Images',
                        $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }
               
                $newImage->setImagePath('/BibicuDorin/Images/' . $newFileName);
            }
            
            //ca sa trimita in BD
            $this->em->persist($newImage);
            $this->em->flush();

            return $this->redirectToRoute('galerie_img');
        }
        
        return $this->render('bibicu_dorin/createImage.html.twig', [
            'form' => $form->createView()
        ]);
    }


#[Route('/BibicuDorin/images/{id}', methods: ['GET'], name: 'show_image')]
    public function show(ImagesDBRepository $imageRepository,$id): Response
    {
        $image = $imageRepository->find($id);
        
        return $this->render('bibicu_dorin/showImage.html.twig', [
            'image' => $image
        ]);
    } 

    #[Route('/BibicuDorin/images/edit/{id}',name: 'edit_image')]
    public function edit(ImagesDBRepository $imageRepository,$id, Request $request): Response 
    {
        //$this->checkLoggedInUser($id);
        $image = $imageRepository->find($id);
        $form = $this->createForm(ImagesDBFormType::class, $image);

        $form->handleRequest($request);
        $imagePath = $form->get('imagePath')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($imagePath) {
                if ($image->getImagePath() !== null) {
                    if (file_exists(
                        $this->getParameter('kernel.project_dir') . $image->getImagePath()
                        )) {
                            $this->GetParameter('kernel.project_dir') . $image->getImagePath();
                    }
                    $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                    try {
                        $imagePath->move(
                            $this->getParameter('kernel.project_dir') . '/public/BibicuDorin/Images',
                            $newFileName
                        );
                    } catch (FileException $e) {
                        return new Response($e->getMessage());
                    }

                    $image->setImagePath('/BibicuDorin/images/' . $newFileName);
                    $this->em->flush();

                    return $this->redirectToRoute('galerie_img');
                }
            } else {
                $image->setTitle($form->get('title')->getData());
                $image->setDataImagine($form->get('data_imagine')->getData());
                $image->setDescription($form->get('description')->getData());

                $this->em->flush();
                return $this->redirectToRoute('galerie_img');
            }
        }

        return $this->render('bibicu_dorin/editImage.html.twig', [
            'image' => $image,
            'form' => $form->createView()
        ]);
    }

    #[Route('/BibicuDorin/images/delete/{id}', methods: ['GET', 'DELETE'], name: 'delete_image')]
    public function delete(ImagesDBRepository $imageRepository,$id): Response
    {
        //$this->checkLoggedInUser($id);
        $image = $imageRepository->find($id);
        $this->em->remove($image);
        $this->em->flush();

        return $this->redirectToRoute('galerie_img');
    }

    #[Route('/BibicuDorin/createActivitateStiintifica', name: 'create_activitateSt')]
    public function createActivitateSt(Request $request): Response
    {
        $activitate = new ActivitateStiintificaDB();
        $form=$this->createForm(ActivitateStiintificaDBFormType::class,$activitate);//apeleaza met createForm
        //dd("sal");
        //exit;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $newActivitate=$form->getData();
            //ca sa trimita in BD
            $this->em->persist($newActivitate);
            $this->em->flush();

            return $this->redirectToRoute('activitateStiintificaBD');
        }
        
        return $this->render('bibicu_dorin/createActivitateStiintifica.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/BibicuDorin/editActivitateStiintifica/{id}',name: 'editActivitateStiintifica')]
    public function editActivitateStiintifica(ActivitateStiintificaDBRepository $activitateRepository,$id, Request $request): Response 
    {
        //$this->checkLoggedInUser($id);
        $activitate = $activitateRepository->find($id);
        $form = $this->createForm(ActivitateStiintificaDBFormType::class, $activitate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        
                $activitate->setTip($form->get('tip')->getData());
                $activitate->setDescriere($form->get('descriere')->getData());

                $this->em->flush();
                return $this->redirectToRoute('activitateStiintificaBD');
            
        }

        return $this->render('bibicu_dorin/editActivitateStiintifica.html.twig', [
            'activitate' => $activitate,
            'form' => $form->createView()
        ]);
    }

    #[Route('/BibicuDorin/deleteActivitateStiintifica/{id}', methods: ['GET', 'DELETE'], name: 'delete_activitateSt')]
    public function deleteActivitateStiintifica(ActivitateStiintificaDBRepository $activitateRepository,$id): Response
    {
        //$this->checkLoggedInUser($id);
        $activitate = $activitateRepository->find($id);
        $this->em->remove($activitate);
        $this->em->flush();

        return $this->redirectToRoute('activitateStiintificaBD');
    }

    #[Route('/BibicuDorin/openMaterialDidactic/{id}', methods: ['GET'], name: 'openMatDid')]
    public function openMaterialDidactic($id): Response
    {
        $material=$id;
        //dd($material);
        //exit;

        return $this->render('bibicu_dorin/openMaterialDidactic.html.twig', [
            'material' => $material
        ]);
    }

}