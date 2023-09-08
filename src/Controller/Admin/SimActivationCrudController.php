<?php

namespace App\Controller\Admin;

use App\Entity\SimActivation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SimActivationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SimActivation::class;
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
