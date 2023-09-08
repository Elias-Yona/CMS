<?php

namespace App\Controller\Admin;

use App\Entity\SimCard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SimCardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SimCard::class;
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
