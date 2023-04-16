<?php

namespace App\Controller\Admin;

use App\Entity\Cavalier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CavalierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cavalier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            NumberField::new('license'),
            TextField::new('dossard'),
            AssociationField::new('noteTotal'),
            AssociationField::new('niveaux'),
            AssociationField::new('competitions'),
        ];
    }
}
