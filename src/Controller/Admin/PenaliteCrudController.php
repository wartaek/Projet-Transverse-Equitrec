<?php

namespace App\Controller\Admin;

use App\Entity\Penalite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PenaliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Penalite::class;
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
