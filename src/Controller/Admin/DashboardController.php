<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route("/admin", name: "admin")]
    public function index(): Response
    {
        return $this->render('@EasyAdmin/page/content.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TP3 Symfony Blog');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Post', 'fa fa-file-text', Post::class)
            ->setDefaultSort(['createdAt' => 'DESC']);
        yield MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class)
            ->setDefaultSort(['createdAt' => 'DESC']);
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
    }
}
