<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

##[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    ##[IsGranted('ROLE_SUPER_ADMIN', message: 'You are not allowed to access the admin dashboard.')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        #$this->denyAccessUnlessGranted('ROLE_ADMIN');
        #$this->denyAccessUnlessGranted(attribute: "IS_AUTHENTIFICATED_FULLY");
        #$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        $url = $this->adminUrlGenerator
        ->setController(EtudiantCrudController::class)
        ->generateUrl();

    return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Stagi');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Etudiants');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Etudiant', 'fas fa-plus', Etudiant::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des Etudiants', 'fas fa-eye', Etudiant::class)
        ]);
        yield MenuItem::section('Entreprise');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Entreprise', 'fas fa-plus', Entreprise::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des Entreprises', 'fas fa-eye', Entreprise::class)
        ]);

        yield MenuItem::section('Stage');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter Stage', 'fas fa-plus', Stage::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des Stages', 'fas fa-eye', Stage::class)
        ]);
        
    }

}
