<?php

namespace App\Controller\Admin;

use App\Entity\ShopStaffAssignment;
use App\Repository\ShopRepository;
use App\Repository\StaffDetailRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ShopStaffAssignmentCrudController extends AbstractCrudController
{
    public function __construct(
        public ShopRepository $shopRepository,
        public StaffDetailRepository $staffDetailRepository
    ) {
    }

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

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            // TextField::new('title'),
            // TextEditorField::new('description'),
            AssociationField::new('shop')->setQueryBuilder(
                fn () => $this->shopRepository->findAll()
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
