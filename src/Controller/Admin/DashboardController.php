<?php

namespace App\Controller\Admin;

use App\Entity\Allure;
use App\Entity\Categorie;
use App\Entity\Cavalier;
use App\Entity\Competition;
use App\Entity\Contrat;
use App\Entity\Epreuve;
use App\Entity\Niveau;
use App\Entity\Note;
use App\Entity\Obstacle;
use App\Entity\Parametrer;
use App\Entity\Penalite;
use App\Entity\Style;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct (private AdminUrlGenerator $adminUrlGenerator){

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
        ->setTitle("<a class='logo' title='ProjetTransverse' href='/'><span class='logo-custom'>ProjetTransverse</span><span class='logo-compact'><i class='fas fa-home'></i></span></a>")
        ->setFaviconPath('img/monLogo.jpg');    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('User');
        yield MenuItem::linkToCrud('List User', 'fas fa-bars', User::class);
        yield MenuItem::section('Categorie');
        yield MenuItem::linkToCrud('List Categorie', 'fas fa-bars', Categorie::class);
        yield MenuItem::section('Cavalier');
        yield MenuItem::linkToCrud('List Cavalier', 'fas fa-bars', Cavalier::class);
        yield MenuItem::section('Competition');
        yield MenuItem::linkToCrud('List Competition', 'fas fa-bars', Competition::class);
        yield MenuItem::section('Epreuve');
        yield MenuItem::linkToCrud('List Epreuve', 'fas fa-bars', Epreuve::class);
        yield MenuItem::section('Niveau');
        yield MenuItem::linkToCrud('List Niveau', 'fas fa-bars', Niveau::class);
        yield MenuItem::section('Obstacle');
        yield MenuItem::linkToCrud('List Obstacle', 'fas fa-bars', Obstacle::class);
        yield MenuItem::section('Parametrer');
        yield MenuItem::linkToCrud('List Parametrer', 'fas fa-bars', Parametrer::class);
        yield MenuItem::section('Penalite');
        yield MenuItem::linkToCrud('List Penalite', 'fas fa-bars', Penalite::class);
        yield MenuItem::section('Allure');
        yield MenuItem::linkToCrud('List Allure', 'fas fa-bars', Allure::class);
        yield MenuItem::section('Contrat');
        yield MenuItem::linkToCrud('List Contrat', 'fas fa-bars', Contrat::class);
        yield MenuItem::section('Note');
        yield MenuItem::linkToCrud('List Note', 'fas fa-bars', Note::class);
        yield MenuItem::section('Style');
        yield MenuItem::linkToCrud('List Style', 'fas fa-bars', Style::class);
    }
}
