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


use App\Repository\PostForumDb1Repository;
use App\Entity\PostForumDb1;
use App\Form\PostForumDBFormType;

use App\Repository\CategoriesForumDb2Repository;
use App\Entity\CategoriesForumDb2;
use App\Repository\UserDBRepository;
use App\Form\CategoriesForumDB2FormType;

use App\Entity\SubcategoriesForumDb2;
use App\Form\SubcategoriesForumDB2FormType;
use App\Repository\SubcategoriesForumDb2Repository;


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

    #[Route('/BibicuDorin/forum',name: 'forumBD')]
    public function Bibicu_Dorin_forum(CategoriesForumDb2Repository $actSRepository,SubCategoriesForumDb2Repository $actSRepository1,PostForumDb1Repository $actSRepository2,UserDBRepository $actSRepository3): Response
    {
        //acts=Categorii actS1=subcategorii, actS2=post, actS3=user
        $actS=$actSRepository->findAll();
        $actS1=$actSRepository1->findAll();
        $actS2=$actSRepository2->findAll();
        $actS3=$actSRepository3->findAll();
        //dd($actS);
        //exit;

        return $this->render('bibicu_dorin/forum.html.twig',['activitatiS'=>$actS,'activitatiS1'=>$actS1, 'activitatiS2'=>$actS2,'activitatiS3'=>$actS3]);
    }

    #[Route('/BibicuDorin/test',name: 'testBD')]
    public function Bibicu_Dorin_test(): Response
    {
        return $this->render('bibicu_dorin/test.html.twig');
    }

    #[Route('/BibicuDorin/scriePost/{categorie}/{subcategorie}/{userId}', name: 'scrie_post')]
    public function scriePost(Request $request, $categorie,$subcategorie,$userId): Response
    {
        //$movie = $this->movieRepository->find($id);
   
        $postare = new PostForumDb1();
        $form=$this->createForm(PostForumDBFormType::class,$postare);//apeleaza met createForm
        //dd("sal");
        //exit;

        //$categorie=dump($request->query->get('categorie'));
        //dd($categorie);
        //$subcategorie=dump($request->query->get('subcategorie'));
        //$userId=dump($request->query->get('userId'));
        //$datetime = new DateTime();
        $datetime = new \DateTime('@'.strtotime('now'));
        $approved = 0;
        //$datetime = date('Y-m-d h:i:s', time());
        //dd($userId);
        //exit;

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $newPostare=$form->getData();
            //$newPostare->setIdUser(2);
            $newPostare->setIdUser($userId);
            //$newPostare->setCategorie($categorie);
            $newPostare->setIdSubcateg($subcategorie);
            $newPostare->setTimp($datetime);
            $newPostare->setApproved($approved);
            //dd({{categorieDB}});
            //dd($categorieDB);
            //dd($newPostare);
            //dd($newPostare->getText());
            //exit;
        
            //ca sa trimita in BD
            $this->em->persist($newPostare);
            $this->em->flush();

            return $this->redirectToRoute('forumBD', ['categorie'=> $categorie,'subcategorie'=> $subcategorie]);
           //return $this->render('bibicu_dorin/forum.html.twig', 
            //['categorie'=>$categorie,'subcategorie'=>$subcategorie]);
        }
        
        return $this->render('bibicu_dorin/postareInForum.html.twig', 
        ['form' => $form->createView(),'categorie'=>$categorie,'subcategorie'=>$subcategorie]);
    }


    #[Route('/BibicuDorin/post/edit/{id}/{val}',name: 'editt_post')]
    public function editPost(PostForumDb1Repository $postRepository,$id, $val,Request $request): Response 
    {
        //$this->checkLoggedInUser($id);

        //dd($val);
        //exit;

        $post = $postRepository->find($id);
        $form = $this->createForm(PostForumDBFormType::class, $post);

        $categorie=dump($request->query->get('categorie'));
        //dd($categorie);
        //exit;
        $subcategorie=dump($request->query->get('subcategorie'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                if($val ==1)
                {
                    $post->setApproved(1);
                }
                if($val ==2)
                {
                    $post->setApproved(2);
                }
                
                $this->em->flush();
                //return $this->redirectToRoute('galerie_img');
                return $this->redirectToRoute('forumBD', ['categorie'=> $categorie,'subcategorie'=> $subcategorie]);
        }

        return $this->render('bibicu_dorin/postareInForum.html.twig', 
        ['form' => $form->createView(),'categorie'=>$categorie,'subcategorie'=>$subcategorie]);
    }


    #[Route('/BibicuDorin/adaugaCategorie/{categorie}/{subcategorie}/{userId}', name: 'adauga_categorie')]
    public function adaugaCategorie(Request $request,$categorie,$subcategorie,$userId): Response
    {
        //$movie = $this->movieRepository->find($id);
   
        $categ = new CategoriesForumDb2();
        $form=$this->createForm(CategoriesForumDB2FormType::class,$categ);//apeleaza met createForm
        //dd("sal");
        //exit;
        
        //preluate din metoda GET
       //$categorie=dump($request->query->get('categorie'));
       //$categorie = $imageRepository->find($id);
        //dd($categorie);
        //dd($_POST['categorie']);
        //exit;
        //$subcategorie=$_POST['subcategorie'];
        //$subcategorie=dump($request->query->get('subcategorie'));
        //$userId=$_POST['userId'];
        //$userId=dump($request->query->get('userId'));
        //dd($userId);
        //dd($_POST['userId']);
        //exit;
        //$datetime = new DateTime();
        $datetime = new \DateTime('@'.strtotime('now'));
        $approved = 0;
        //$datetime = date('Y-m-d h:i:s', time());
       

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $newCategorie=$form->getData();
            //$newPostare->setIdUser(2);
            $newCategorie->setIdUser($userId);
            //$newPostare->setCategorie($categorie);
            //$newPostare->setIdSubcateg($subcategorie);
            $newCategorie->setTimp($datetime);
            $newCategorie->setApproved($approved);
            //dd({{categorieDB}});
            //dd($categorieDB);
            //dd($newPostare);
            //dd($newPostare->getText());
            //exit;
        
            //ca sa trimita in BD
            $this->em->persist($newCategorie);
            $this->em->flush();

            return $this->redirectToRoute('forumBD', ['categorie'=> $categorie,'subcategorie'=> $subcategorie]);
           //return $this->render('bibicu_dorin/forum.html.twig', 
            //['categorie'=>$categorie,'subcategorie'=>$subcategorie]);
        }
        
        return $this->render('bibicu_dorin/adaugaCategorie.html.twig', 
        ['form' => $form->createView(),'categorie'=>$categorie,'subcategorie'=>$subcategorie,'userId'=>$userId]);
    }



    #[Route('/BibicuDorin/afiseazaCategorie/{userId}',name: 'categorieBD')]
    public function Bibicu_Dorin_categorie(CategoriesForumDb2Repository $actSRepository,UserDBRepository $actSRepository3,$userId): Response
    {
        //acts=Categorii actS1=subcategorii, actS2=post, actS3=user
        $actS=$actSRepository->findAll();
        //$actS1=$actSRepository1->findAll();
        //$actS2=$actSRepository2->findAll();
        $actS3=$actSRepository3->findAll();
        //dd($actS);
        //exit;

        return $this->render('bibicu_dorin/afiseazaCategorie.html.twig',['activitatiS'=>$actS,'activitatiS3'=>$actS3,'userId'=>$userId]);
    }



    #[Route('/BibicuDorin/categorie/edit/{id}/{val}/{userId}',name: 'edit_categorie')]
    public function editCategorie(CategoriesForumDb2Repository $categorieRepository,$id,$val,$userId,Request $request): Response 
    {
        //$this->checkLoggedInUser($id);

        //dd($id);
        //exit;

        $categorie = $categorieRepository->find($id);
        $form = $this->createForm(CategoriesForumDB2FormType::class, $categorie);

        //$categorie=dump($request->query->get('categorie'));
        //dd($categorie);
        //exit;
        //$subcategorie=dump($request->query->get('subcategorie'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                if($val ==1)
                {
                    $categorie->setApproved(1);
                }
                if($val ==2)
                {
                    $categorie->setApproved(2);
                }
                
                $this->em->flush();
                //return $this->redirectToRoute('galerie_img');
                return $this->redirectToRoute('categorieBD',['userId'=>$userId]);
        }

        return $this->render('bibicu_dorin/adaugaCategorie.html.twig', 
        ['form' => $form->createView()]);
    }


    #[Route('/BibicuDorin/adaugaSubcategorie/{categorie}/{subcategorie}/{userId}', name: 'adauga_subcategorie')]
    public function adaugaSubcategorie(Request $request,$categorie,$subcategorie,$userId): Response
    {
        //$movie = $this->movieRepository->find($id);
   
        $subcategorie = new SubcategoriesForumDb2();
        $form=$this->createForm(SubcategoriesForumDB2FormType::class,$subcategorie);//apeleaza met createForm
        //dd("sal");
        //exit;

        //$categorie=dump($request->query->get('categorie'));
        //dd($categorie);
        //exit;
        //$subcategorie=dump($request->query->get('subcategorie'));
        //$userId=dump($request->query->get('userId'));
        //$datetime = new DateTime();
        $datetime = new \DateTime('@'.strtotime('now'));
        $approved = 0;
        //$datetime = date('Y-m-d h:i:s', time());
        //dd($userId);
        //exit;

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $newSubcategorie=$form->getData();
            //$newPostare->setIdUser(2);
            $newSubcategorie->setIdUser($userId);
            $newSubcategorie->setIdCateg($categorie);
            //$newPostare->setIdSubcateg($subcategorie);
            $newSubcategorie->setTimp($datetime);
            $newSubcategorie->setApproved($approved);
            //dd({{categorieDB}});
            //dd($categorieDB);
            //dd($newPostare);
            //dd($newPostare->getText());
            //exit;
        
            //ca sa trimita in BD
            $this->em->persist($newSubcategorie);
            $this->em->flush();

            return $this->redirectToRoute('forumBD',['categorie'=>$categorie,'subcategorie'=>$subcategorie,'userId'=>$userId]);
           //return $this->render('bibicu_dorin/forum.html.twig', 
            //['categorie'=>$categorie,'subcategorie'=>$subcategorie]);
        }
        
        return $this->render('bibicu_dorin/adaugaSubcategorie.html.twig', 
        ['form' => $form->createView(),'categorie'=>$categorie,'subcategorie'=>$subcategorie,'userId'=>$userId]);
    }


    #[Route('/BibicuDorin/afiseazaSubcategorie',name: 'subcategorieBD')]
    public function Bibicu_Dorin_subcategorie(SubcategoriesForumDb2Repository $actSRepository,CategoriesForumDb2Repository $actSRepository1,UserDBRepository $actSRepository3): Response
    {
        //acts=Categorii actS1=subcategorii, actS2=post, actS3=user
        $actS=$actSRepository->findAll();
        $actS1=$actSRepository1->findAll();
        //$actS2=$actSRepository2->findAll();
        $actS3=$actSRepository3->findAll();
		//dd($actS);
        //exit;

        return $this->render('bibicu_dorin/afiseazaSubcategorie.html.twig',['activitatiS'=>$actS,'activitatiS1'=>$actS1,'activitatiS3'=>$actS3]);
    }

    #[Route('/BibicuDorin/subcategorie/edit/{id}/{val}',name: 'edity_post')]
    public function editSubcategorie(SubcategoriesForumDb2Repository $subcategorieRepository,$id, $val,Request $request): Response 
    {
        //$this->checkLoggedInUser($id);

        //dd($val);
        //exit;

        $subcategorie = $subcategorieRepository->find($id);
        $form = $this->createForm(SubcategoriesForumDB2FormType::class, $subcategorie);

        //$categorie=dump($request->query->get('categorie'));
        //dd($categorie);
        //exit;
        //$subcategorie=dump($request->query->get('subcategorie'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                if($val ==1)
                {
                    $subcategorie->setApproved(1);
                }
                if($val ==2)
                {
                    $subcategorie->setApproved(2);
                }
                
                $this->em->flush();
                //return $this->redirectToRoute('galerie_img');
                return $this->redirectToRoute('subcategorieBD');
        }

        return $this->render('bibicu_dorin/adaugaSubcategorie.html.twig', 
        ['form' => $form->createView()]);
    }
}