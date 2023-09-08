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
use SebastianBergmann\Type\SimpleType;
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
            MenuItem::subMenu('SIM Cards', 'fas fa-list')->setSubItems([
                MenuItem::linkToCrud('SIM Card Types', 'fas fa-list', SimcardType::class),
                MenuItem::linkToCrud('SIM Activations', 'fas fa-list', SimActivation::class),
                MenuItem::linkToCrud('SIM Cards', 'fas fa-list', SimCard::class),
                MenuItem::linkToCrud('SIM Status', 'fas fa-list', SimStatus::class),
            ]),
            MenuItem::linkToCrud('Customers', 'fas fa-list', CustomerDetail::class),
            MenuItem::linkToCrud('Drivers', 'fas fa-list', DriverDetail::class),
            MenuItem::linkToCrud('Shops', 'fas fa-list', Shop::class),
            // MenuItem::linkToCrud('', 'fas fa-list', ShopStaffAssignment::class);

            MenuItem::linkToCrud('Staff', 'fas fa-list', StaffDetail::class),
            MenuItem::linkToCrud('Staff Earnings', 'fas fa-list', StaffEarning::class),
            MenuItem::linkToCrud('Tracks', 'fas fa-list', Track::class),
            MenuItem::linkToCrud('Users', 'fas fa-list', User::class),
            MenuItem::linkToCrud('Vans', 'fas fa-list', Van::class),
            // MenuItem::linkToCrud('', 'fas fa-list', VehicleDriverAssignment::class),
            // MenuItem::linkToCrud('', 'fas fa-list', VehicleStaffAssignment::class)
        ];
    }
}
