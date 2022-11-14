<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\SousCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[isGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ProductCrudController::class)
            ->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GITE LES BRUYERES');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Panneau de controle', 'fa fa-home');

        yield MenuItem::subMenu('Produit', "fa-brands fa-product-hunt")->setSubItems([
            MenuItem::linkToCrud('Créer un produit', 'fas fa-plus', Product::class)
                ->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les produit', 'fas fa-eye', Product::class),
        ]);

        yield MenuItem::subMenu('Catégorie', "fa-solid fa-folder")->setSubItems([
            MenuItem::linkToCrud('Créer catégorie', 'fas fa-plus', Category::class)
                ->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les catégorie', 'fas fa-eye', Category::class),
        ]);

        yield MenuItem::subMenu('Sous Catégorie', "fa-solid fa-folder-tree")->setSubItems([
            MenuItem::linkToCrud('Créer sous-catégorie', 'fas fa-plus', SousCategory::class)
                ->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les sous-catégorie', 'fas fa-eye', SousCategory::class),
        ]);

//        yield MenuItem::linkToDashboard('Articles', 'fa-solid fa-newspaper');
//
//        yield MenuItem::linkToDashboard('Utilisateurs', 'fa-sharp fa-solid fa-users');



        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
