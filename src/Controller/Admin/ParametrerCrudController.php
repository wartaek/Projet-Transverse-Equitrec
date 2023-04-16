<?php

namespace App\Controller\Admin;

use App\Entity\Parametrer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ParametrerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Parametrer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('hauteur'),
            TextField::new('largeur'),
            TextField::new('tempsMax'),
            TextField::new('pente'),
            TextField::new('front'),
            TextField::new('informations'),
            AssociationField::new('epreuve'),
            AssociationField::new('niveau'),
            AssociationField::new('obstacle'),
        ];
    }
}
