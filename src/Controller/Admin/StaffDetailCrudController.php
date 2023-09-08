<?php

namespace App\Controller\Admin;

use App\Entity\StaffDetail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StaffDetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StaffDetail::class;
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
