<?php

namespace App\Controller\Admin;

use App\Entity\Cavalier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CavalierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cavalier::class;
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
