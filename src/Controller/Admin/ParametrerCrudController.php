<?php

namespace App\Controller\Admin;

use App\Entity\Parametrer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParametrerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Parametrer::class;
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
