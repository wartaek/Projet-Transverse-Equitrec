<?php

namespace App\Controller\Admin;

use App\Entity\Epreuve;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EpreuveCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Epreuve::class;
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
