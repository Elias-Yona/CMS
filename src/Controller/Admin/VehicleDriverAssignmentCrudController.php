<?php

namespace App\Controller\Admin;

use App\Entity\VehicleDriverAssignment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehicleDriverAssignmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehicleDriverAssignment::class;
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
