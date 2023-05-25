<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BasimFormRepository;
use App\Repository\PostBasimFormRepository;
use App\Repository\SubBasimFormRepository;

class FormBasimController extends AbstractController
{
    #[Route('/form/basim', name: 'app_form_basim')]
    public function show(BasimFormRepository $basimFormRepository, SubBasimFormRepository $subBasimFormRepository): Response
    {
        $categories = $basimFormRepository->findAll();

        if (!$categories) {
            throw $this->createNotFoundException(
                'We dont Have any Categories!'
            );
        }
		
		$subCategories = $subBasimFormRepository->findAll();

        if (!$subCategories) {
            throw $this->createNotFoundException(
                'We dont have any sub Categories!'
            );
        }

        return $this->render('form_basim/index.html.twig', ['categories' => $categories, 'subCategories' => $subCategories]);
    }

    #[Route('/getPosts', name: 'get_posts')]
	public function getPosts(PostBasimFormRepository $postBasimFormRepository,SubBasimFormRepository $subBasimFormRepository, Request $request): Response
    {

        $id = $request->query->get('id');
        $subCategory = $subBasimFormRepository.find($id);
		$posts = $subCategory->getPostBasimForm();

        $arrayCollection = array();
		foreach($posts as $item) {
			 $arrayCollection[] = array(
				 'text' => $item->getText(),
				 'data' => $item->getData()
			 );
		}

		return new JsonResponse($arrayCollection);
    }
}
