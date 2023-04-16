<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $rolesChoices = [
            'Administrateur' => 'ROLE_ADMIN',
            'Utilisateur' => 'ROLE_USER',
        ];

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            EmailField::new('email'),
            TextField::new('password')->setFormType(PasswordType::class),
            ChoiceField::new('roles')->setChoices($rolesChoices)->allowMultipleChoices(),
            DateTimeField::new('last_login')->hideOnForm(),
            DateTimeField::new('register_date')->hideOnForm(),
            AssociationField::new('noteTotal'),
            AssociationField::new('competition'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof User) return;

        $entityInstance->setPassword(
            $this->passwordEncoder->hashPassword(
                $entityInstance,
                $entityInstance->getPassword()
            )
        );
        $entityInstance->setLastLogin(new \DateTimeImmutable());
        $entityInstance->setRegisterDate(new \DateTimeImmutable());

        parent::persistEntity($em, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof User) {
            return;
        }

        $plainPassword = $entityInstance->getPassword();
        if ($plainPassword) {
            $entityInstance->setPassword(
                $this->passwordEncoder->hashPassword(
                    $entityInstance,
                    $plainPassword
                )
            );
        }

        parent::updateEntity($em, $entityInstance);
    }
}
