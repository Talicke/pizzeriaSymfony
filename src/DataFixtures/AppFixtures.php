<?php

namespace App\DataFixtures;
use App\Entity\User;
use App\Entity\Menu;
use App\Entity\Drink;
use App\Entity\Cart;
use App\Entity\Pizza;
use App\Entity\PizzaCart;
use App\Entity\PizzaMenu;
use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //création d'une variable qui va contenir
        $faker = Faker\Factory::create('fr_FR');
            //Tableau vide qui va stocker les utilisateurs que l’on génère
            $users = [];
            //Boucle qui va itérer 50 utilisateurs factices
                for($i=0; $i<20; $i++){
                $user = new User();
                //génération d'un utilisateur factice
                $user->setNameUser($faker->name());
                $user->setFirstNameUser($faker->firstname());
                $user->setMailUser($faker->email());
                $user->setPasswordUser($faker->password());
                //stockage dans le manager
                $manager->persist($user);
                $users[] = $user;
                }
            //Tableau vide qui va stocker les Menus que l’on génère    
            $menus = [];
            // Boucle qui va intérer 15 Menus factices   
                for($i=0; $i<10; $i++){
                    $menu = new Menu();
                    //génération d'un menu factice
                    $menu->setNameMenu($faker->name());
                    $menu->setDescMenu($faker->text(200));
                    $menu->setImgMenu($faker->imageUrl(640, 480, 'menus', true));
                    $menu->setPriceMenu($faker->randomNumber(2));
                    //stockage dans le manager
                    $manager->persist($menu);
                    $menus[] = $menu;
                }
            //Tableau vide qui va stocker les ingrédients que l’on génère    
            $ingredients = [];
            // Boucle qui va intérer 15 Menus factices   
                for($i=0; $i<30; $i++){
                    $ingredient = new Ingredient();
                    //génération d'un menu factice
                    $ingredient->setNameIngredient($faker->name());
                    $ingredient->setDescIngredient($faker->text(200));
                    $ingredient->setImgIngredient($faker->imageUrl(640, 480, 'ingrédients', true));
                    //stockage dans le manager
                    $manager->persist($ingredient);
                    $ingredients[] = $ingredient;
                }
            //Tableau vide qui va stocker les boissons que l’on génère    
            $drinks = [];
             // Boucle qui va intérer 15 Menus factices   
                for($i=0; $i<20; $i++){
                    $drink = new Drink();
                    //génération d'un menu factice
                    $drink->setNameDrink($faker->name());
                    $drink->setDescDrink($faker->text(200));
                    $drink->setImgDrink($faker->imageUrl(640, 480, 'boissons', true));
                    $drink->setPriceDrink($faker->randomNumber(2));
                    //stockage dans le manager
                    $manager->persist($drink);
                    $drinks[] = $drink;
                }
            //Tableau vide qui va stocker les pizzas  que l’on génère
            $pizzas = [];
             // Boucle qui va intérer 25 pizzas factices 
                for($i=0; $i<20; $i++){
                    $pizza = new Pizza();
                    $pizza->setNamePizza($faker->name());
                    $pizza->setDescPizza($faker->text(200));
                    $pizza->setImgPizza($faker->imageUrl(640, 480, 'pizzas', true));
                    $pizza->setPricePizza($faker->randomNumber(2));
                    //stockage dans le manager
                    $manager->persist($pizza);
                    $pizzas[] = $pizza;
            }
                    //Tableau vide qui va stocker les cartes  que l’on génère 
            $carts = []; 
            // Boucle qui va intérer 10 cartess factices  
            for($i=0; $i<10; $i++){
                $cart = new Cart(); 
                $cart->setDateCart(new \DateTimeImmutable());
                $cart->setUser($users[$faker->numberBetween(0, 19)]);
                 //stockage dans le manager
                 $manager->persist($cart);
                 $carts[] = $cart;
            } 

                
           //Tableau vide qui va stocker les pizzaMenu  que l’on génère 
            $pizzaMenus = [];
            // Boucle qui va intérer 10 cartes factices   
                for($i=0; $i<20; $i++){
                    $pizzaMenu = new PizzaMenu();
                    //génération d'une carte factice
                    $pizzaMenu->setQuantite($faker->randomNumber(2));
                    $pizzaMenu->addPizza($pizzas[rand(0, 19)]);
                    $pizzaMenu->addMenu($menus[rand(0, 9)]);
                    //stockage dans le manager
                    $manager->persist($pizzaMenu);
                        $pizzaMenus[] = $pizzaMenu;
                }
                //Tableau vide qui va stocker les pizzaCarts  que l’on génère 
             $pizzaCarts = [];
             // Boucle qui va intérer 10 cartes factices   
                 for($i=0; $i<20; $i++){
                     $pizzaCart = new PizzaCart();
                     //génération d'une carte factice
                     $pizzaCart->setQuantite($faker->randomNumber(2));
                     $pizzaCart->addPizza($pizzas[rand(0, 19)]);
                     $pizzaCart->addCart($carts[rand(0, 9)]);
                     //stockage dans le manager
                     $manager->persist($pizzaCart);
                         $pizzaCarts[] = $pizzaCart;
                 } 
            
         
           

        $manager->flush();
    }
}
