<?php

namespace App\Controller\Admin;

use App\Entity\Penalite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PenaliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Penalite::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libellePenalite'),
            TextField::new('description'),
            AssociationField::new('noteTotal'),
        ];
    }
}
