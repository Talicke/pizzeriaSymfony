<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PizzaType;

class PizzaFormController extends AbstractController
{
    #[Route('/pizza/form', name: 'app_pizza_form')]
    public function index(): Response
    {
        $form = $this->createForm(PizzaType::class);
        return $this->render('pizza_form/index.html.twig', [
            'controller_name' => 'PizzaFormController',
            'form' => $form->createView()
        ]);
    }
}


