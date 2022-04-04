<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use App\Entity\Rubrique;
use App\Entity\Redacteur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ActuCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion d\'actualités - Administration');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Actu::class);
        yield MenuItem::linkToCrud('Rubriques', 'fas fa-list', Rubrique::class);
        yield MenuItem::linkToCrud('Rédacteurs', 'fas fa-users', Redacteur::class);
        yield MenuItem::linkToRoute('Retour à l\'accueil', 'fa fa-home', 'app_home');
    }
}
