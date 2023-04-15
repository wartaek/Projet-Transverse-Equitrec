<?php

namespace App\Controller\Admin;

use App\Entity\TypeNote;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeNoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeNote::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
