<?php

namespace App\Controller;

use App\Service\CustomDataStorageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OTUserController extends AbstractController
{
    private $dataStorage;

    public function __construct(CustomDataStorageService $dataStorage)
    {
        $this->dataStorage = $dataStorage;
    }

    public function index(): Response
    {
        $users = $this->dataStorage->getUsers();

        // Process the users data and render a response
        // ...

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }
}