<?php

namespace App\Controller\Admin;

use App\Entity\Epreuve;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EpreuveCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Epreuve::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('commentaire'),
            AssociationField::new('competition'),
            AssociationField::new('categories'),
            AssociationField::new('parametrers'),
        ];
    }
}
