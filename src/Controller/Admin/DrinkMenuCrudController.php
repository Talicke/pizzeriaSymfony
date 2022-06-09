<?php

namespace App\Controller\Admin;

use App\Entity\DrinkMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DrinkMenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DrinkMenu::class;
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
