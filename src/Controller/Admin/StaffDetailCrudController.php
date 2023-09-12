<?php

namespace App\Controller\Admin;

use App\Entity\StaffDetail;
use App\Entity\User;
use App\Entity\StaffEarning;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class StaffDetailCrudController extends AbstractCrudController
{
    public function __construct(
        public UserRepository $userRepository,
        public EntityManagerInterface $entityManager
    ) {
    }

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

    public function configureFields(string $pageName): iterable
    {
        return [
            // AssociationField::new('user_account')->setQueryBuilder(
            //     fn () => $this->userRepository->findAll()
            // ),
            'date_of_birth',
            'gender',
            'phone_number',
            'address',
            'updated_at',
            'profile_picture'
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $user = $this->getUser();
        $staff = new StaffDetail();
        $staff->setUserAccount($user);

        $staffEarning = new StaffEarning();
        $staffEarning->setStaffDetail($staff);
        $staffEarning->setAmount(0);
        $this->entityManager->persist($staffEarning);

        return $staff;
    }
}
