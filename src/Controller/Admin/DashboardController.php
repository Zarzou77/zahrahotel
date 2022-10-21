<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use App\Entity\Slider;
use App\Entity\Chambre;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ChambreCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    private $routeBuilder;

    public function __construct(AdminUrlGenerator $routebuilder)
    {
        $this->routeBuilder = $routebuilder;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->redirect($this->routeBuilder->setController(ChambreCrudController::class)->generateUrl());
    }
    
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<b>BACKOFFICE Zahrahotel</b>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute("Retour à l'accueil", 'fa fa-home','app_hotel');
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-dashboard');
        yield MenuItem::section('Hotel');
        yield MenuItem::linkToCrud('Chambres', 'fa fa-bed', Chambre::class);
        yield MenuItem::section('Membres');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', Membre::class);
        yield MenuItem::section('Commandes');
        yield MenuItem::linkToCrud('Commandes', 'fa fa-cash-register', Commande::class);
        yield MenuItem::linkToCrud('Slider', 'fa fa-camera', Slider::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
