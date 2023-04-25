<?php

namespace App\Controller;

use App\Entity\UserDB;
use App\Form\RegistrationDBFormType;
use App\Security\LoginDBAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationDBController extends AbstractController
{
    #[Route('/registerDB', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginDBAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new UserDB();
        $form = $this->createForm(RegistrationDBFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            /*return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );*/

            return $this->redirectToRoute('galerie_img');
        }

        return $this->render('registration/registerDB.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
