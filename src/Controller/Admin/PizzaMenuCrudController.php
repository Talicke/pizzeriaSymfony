<?php

namespace App\Controller\Admin;

use App\Entity\PizzaMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PizzaMenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PizzaMenu::class;
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
