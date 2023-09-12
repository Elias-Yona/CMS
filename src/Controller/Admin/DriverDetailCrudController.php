<?php

namespace App\Controller\Admin;

use App\Entity\DriverDetail;
use Doctrine\DBAL\Driver\IBMDB2\Driver;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DriverDetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DriverDetail::class;
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

    public function createEntity(string $entityFqcn)
    {
        $user = $this->getUser();
        $driver = new DriverDetail();
        $driver->setUserAccount($user);


        return $driver;
    }
}
