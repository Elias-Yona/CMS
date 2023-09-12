<?php

namespace App\Controller\Admin;

use App\Entity\VehicleDriverAssignment;
use App\Repository\VanRepository;
use App\Repository\DriverDetailRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VehicleDriverAssignmentCrudController extends AbstractCrudController
{

    public function __construct(
        public VanRepository $vanRepository,
        public DriverDetailRepository $driverDetailRepository
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return VehicleDriverAssignment::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description'),
            AssociationField::new('van')->setQueryBuilder(
                fn () => $this->vanRepository->findAll()
            ),
            AssociationField::new('driverDetail')->setQueryBuilder(
                fn () => $this->driverDetailRepository->findAll()
            ),
            'assignment_date',
            'assignment_duration',
            'is_transferred'
        ];
    }
}
