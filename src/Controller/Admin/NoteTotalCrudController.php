<?php

namespace App\Controller\Admin;

use App\Entity\NoteTotal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NoteTotalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NoteTotal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            NumberField::new('note'),
            TextField::new('observation'),
            AssociationField::new('user'),
            AssociationField::new('penalites'),
            AssociationField::new('obstacles'),
            AssociationField::new('cavaliers'),
            AssociationField::new('posseders'),
        ];
    }
}
