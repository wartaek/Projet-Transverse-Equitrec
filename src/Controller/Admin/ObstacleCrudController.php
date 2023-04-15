<?php

namespace App\Controller\Admin;

use App\Entity\Obstacle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ObstacleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Obstacle::class;
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
