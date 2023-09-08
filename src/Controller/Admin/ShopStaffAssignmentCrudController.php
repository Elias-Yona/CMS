<?php

namespace App\Controller\Admin;

use App\Entity\ShopStaffAssignment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ShopStaffAssignmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ShopStaffAssignment::class;
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
