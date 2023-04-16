<?php

namespace App\Controller\Admin;

use App\Entity\Obstacle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ObstacleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Obstacle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            AssociationField::new('noteTotal'),
            AssociationField::new('parametrers'),
        ];
    }
}
