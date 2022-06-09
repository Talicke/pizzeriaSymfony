<?php

namespace App\Controller\Admin;

use App\Entity\PizzaIngredient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PizzaIngredientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PizzaIngredient::class;
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
