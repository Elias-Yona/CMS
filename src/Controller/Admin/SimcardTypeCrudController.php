<?php

namespace App\Controller\Admin;

use App\Entity\SimcardType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SimcardTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SimcardType::class;
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
