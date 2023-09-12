<?php

namespace App\Controller\Admin;

use App\Entity\SimcardType;
use App\Entity\CustomerDetail;
use App\Entity\DriverDetail;
use App\Entity\Shop;
use App\Entity\ShopStaffAssignment;
use App\Entity\SimActivation;
use App\Entity\SimCard;
use App\Entity\SimStatus;
use App\Entity\StaffDetail;
use App\Entity\StaffEarning;
use App\Entity\Track;
use App\Entity\User;
use App\Entity\Van;
use App\Entity\VehicleDriverAssignment;
use App\Entity\VehicleStaffAssignment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(SimcardTypeCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Cms');
    }

    public function configureMenuItems(): iterable
    {
        return [
            // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
            // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
            MenuItem::subMenu('SIM Cards', 'fa fa-mobile')->setSubItems([
                MenuItem::linkToCrud('Types', 'fas fa-sim-card', SimcardType::class),
                MenuItem::linkToCrud('Activations', 'fas fa-check-square', SimActivation::class),
                MenuItem::linkToCrud('Card List', 'fas fa-list', SimCard::class),
                MenuItem::linkToCrud('Status', 'fas fa-info-circle', SimStatus::class),
            ]),
            MenuItem::linkToCrud('Customers', 'fa fa-users', CustomerDetail::class),
            MenuItem::linkToCrud('Drivers', 'fas fa-truck', DriverDetail::class),
            MenuItem::linkToCrud('Shops', 'fas fa-store', Shop::class),
            // MenuItem::linkToCrud('', 'fas fa-list', ShopStaffAssignment::class);

            MenuItem::linkToCrud('Staff', 'fas fa-user', StaffDetail::class),
            MenuItem::linkToCrud('Staff Earnings', 'fa fa-money', StaffEarning::class),
            MenuItem::linkToCrud('Tracks', 'fas fa-exchange-alt', Track::class),
            MenuItem::linkToCrud('Users', 'fas fa-user-friends', User::class),
            MenuItem::linkToCrud('Vans', 'fas fa-shuttle-van', Van::class),
            // MenuItem::linkToCrud('', 'fas fa-list', VehicleDriverAssignment::class),
            // MenuItem::linkToCrud('', 'fas fa-list', VehicleStaffAssignment::class)
        ];
    }
}