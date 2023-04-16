<?php

namespace App\Controller\Admin;

use App\Entity\TypeNote;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeNoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeNote::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelleTypeNote'),
            AssociationField::new('posseders'),
        ];
    }
}
