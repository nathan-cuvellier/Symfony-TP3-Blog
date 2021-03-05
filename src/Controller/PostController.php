<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $emPost = $this->entityManager->getRepository(Post::class);

        return $this->render('post/index.html.twig', [
            'posts' => $emPost->findAll(),
            'last_posts' => $emPost->findLastPosts(),
            'last_posts_user' => $emPost->findLastPostsByUser(1),
            'top_posts_user' => $emPost->findTopPostsByUser(1),
            'controller_name' => 'PostController',
        ]);
    }

    #[Route('/article/{post}', name: 'post')]
    public function post(Post $post, Request $request): Response
    {
        $emPost = $this->entityManager->getRepository(Post::class);

        $comment = new Comment();
        $comment->setPost($post);
        $comment->setAuthor($this->entityManager->getRepository(User::class)->findAll()[0]);

        $form = $this->createForm(CommentType::class, $comment)
            ->remove('createdAt')
            ->remove('author')
            ->remove('post');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();

            $this->entityManager->persist($comment);
            $this->entityManager->flush();

            return $this->redirectToRoute('post', ['id' => $post->getId()]);
        }

        return $this->render('post/post.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
            'last_posts_user' => $emPost->findLastPosts(5),
            'top_posts_user' => $emPost->findTopPostsByUser(1),
            'controller_name' => 'PostController',
        ]);
    }


}
