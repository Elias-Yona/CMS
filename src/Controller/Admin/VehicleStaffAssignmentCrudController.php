<?php

namespace App\Controller\Admin;

use App\Entity\VehicleStaffAssignment;
use App\Repository\StaffDetailRepository;
use App\Repository\VanRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VehicleStaffAssignmentCrudController extends AbstractCrudController
{
    public function __construct(
        public VanRepository $vanRepository,
        public StaffDetailRepository $staffDetailRepository
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return VehicleStaffAssignment::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description'),
            AssociationField::new('van')->setQueryBuilder(
                fn () => $this->vanRepository->findAll()
            ),
            AssociationField::new('staffDetail')->setQueryBuilder(
                fn () => $this->staffDetailRepository->findAll()
            ),
            'assignment_date',
            'assignment_duration',
            'is_transferred'
        ];
    }
}
