<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordEncoderInterface $passwordEncoder
    )
    {
    }


    #[Route(path: '/login', name:"app_login")]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('post_index');
        }

        $form = $this->createForm(UserType::class);

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
/*
    #[Route(path: '/register', name:"app_register")]
    public function register(Request $request): Response
    {
        $form = $this->createForm(UserType::class)
            ->remove('isBlocked')
            ->remove('isActive')
            ->add('password', RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Passwords do not match',
                    'first_options'  => ['label' => 'Password'],
                    'second_options' => ['label' => 'Repeat Password'],
                ]
            );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('success', 'Utilisateur crée');
            return $this->redirectToRoute('post_index');
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView()
        ]);
    }*/

    #[Route("/logout", name:"app_logout")]
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
