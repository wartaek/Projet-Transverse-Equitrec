<?php

namespace App\Controller\Admin;

use App\Entity\Allure;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class AllureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allure::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            NumberField::new('val_allure'),
            AssociationField::new('note'),
        ];
    }
}
