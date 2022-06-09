<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use App\Entity\pizzaingredient;
use App\Repository\PizzaIngredientRepository;

class PizzaController extends AbstractController
{
    #[Route('/pizza', name: 'app_pizza')]
    public function index(PizzaRepository $pizzaRepo): Response
    {
        $pizzas = $pizzaRepo->findAll();
        return $this->render('pizza/index.html.twig', [
            'pizzas' => $pizzas,
        ]);
    }
}
