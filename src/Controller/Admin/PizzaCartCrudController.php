<?php

namespace App\Controller\Admin;

use App\Entity\PizzaCart;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PizzaCartCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PizzaCart::class;
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
