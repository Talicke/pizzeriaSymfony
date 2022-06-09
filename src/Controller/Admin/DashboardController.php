<?php

namespace App\Controller\Admin;
use App\Entity\Pizza;
use App\Entity\Menu;
use App\Entity\User;
use App\Entity\Drink;
use App\Entity\Ingredient;
use App\Entity\Cart;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Controller\Admin\PizzaCrudController;


class DashboardController extends AbstractDashboardController
{
    // constructeur d'url
    public function __construct(private AdminUrlGenerator $AdminUrlGenerator){}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this-> AdminUrlGenerator
        ->setController(PizzaCrudController::class)
        ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Patron de la Pizzeria');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour à l\'accueil', 'fa fa-home', 'app_accueil');
        yield MenuItem::linkToCrud('Menu', 'fas fa-cutlery ', Menu::class);
        yield MenuItem::linkToCrud('Pizza', 'fas fa-pie-chart ', Pizza::class);
        yield MenuItem::linkToCrud('Ingredient', 'fas fa-slideshare', Ingredient::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Cart', 'fas fa-cart-arrow-down', Cart::class);
        yield MenuItem::linkToCrud('Drink', 'fas fa-beer ', Drink::class);
    }
}
