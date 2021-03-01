<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/articles', name: 'posts')]
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $this->entityManager->getRepository(Post::class)->findAll(),
            'last_posts' =>$this->entityManager->getRepository(Post::class)->getLastPosts(5),
            'controller_name' => 'PostController',
        ]);
    }

    #[Route('/article/{id}', name: 'post')]
    public function post(Post $post): Response
    {
        return $this->render('post/post.html.twig', [
            'post' => $post,
            'last_posts' =>$this->entityManager->getRepository(Post::class)->getLastPosts(5),
            'controller_name' => 'PostController',
        ]);
    }


}
