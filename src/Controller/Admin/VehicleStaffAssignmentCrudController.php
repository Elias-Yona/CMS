<?php

namespace App\Controller\Admin;

use App\Entity\VehicleStaffAssignment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehicleStaffAssignmentCrudController extends AbstractCrudController
{
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
}
