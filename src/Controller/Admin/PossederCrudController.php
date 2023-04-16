<?php

namespace App\Controller\Admin;

use App\Entity\Posseder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PossederCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Posseder::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            NumberField::new('val'),
            TextField::new('nom'),
            AssociationField::new('noteTotal'),
            AssociationField::new('typeNote'),
        ];
    }
}
