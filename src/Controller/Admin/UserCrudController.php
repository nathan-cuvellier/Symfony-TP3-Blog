<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class UserCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('username');
        yield TextField::new('email');

        yield ChoiceField::new('roles')
            ->allowMultipleChoices()
            ->setChoices(['ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_AUTHOR' => 'ROLE_AUTHOR'])
            ->setRequired(false);

        yield BooleanField::new('isActive');
        yield BooleanField::new('isBlocked');
        yield BooleanField::new('isVerified');

    }

}
