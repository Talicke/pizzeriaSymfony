<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $name_pizza;

    #[ORM\Column(type: 'text', nullable: true)]
    private $desc_pizza;

    #[ORM\Column(type: 'float', nullable: true)]
    private $price_pizza;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $img_pizza;

    #[ORM\ManyToMany(targetEntity: PizzaIngredient::class, inversedBy: 'id_pizza')]
    private $pizzaingredient;

    #[ORM\ManyToMany(targetEntity: PizzaCart::class, inversedBy: 'pizzas')]
    private $pizzaCart;

    #[ORM\ManyToMany(targetEntity: PizzaMenu::class, inversedBy: 'pizzas')]
    private $PizzaMenu;

    public function __construct()
    {
        $this->pizzaingredient = new ArrayCollection();
        $this->pizzaCart = new ArrayCollection();
        $this->PizzaMenu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePizza(): ?string
    {
        return $this->name_pizza;
    }

    public function setNamePizza(?string $name_pizza): self
    {
        $this->name_pizza = $name_pizza;

        return $this;
    }

    public function getDescPizza(): ?string
    {
        return $this->desc_pizza;
    }

    public function setDescPizza(?string $desc_pizza): self
    {
        $this->desc_pizza = $desc_pizza;

        return $this;
    }

    public function getPricePizza(): ?float
    {
        return $this->price_pizza;
    }

    public function setPricePizza(?float $price_pizza): self
    {
        $this->price_pizza = $price_pizza;

        return $this;
    }

    public function getImgPizza(): ?string
    {
        return $this->img_pizza;
    }

    public function setImgPizza(?string $img_pizza): self
    {
        $this->img_pizza = $img_pizza;

        return $this;
    }

    /**
     * @return Collection<int, pizzaingredient>
     */
    public function getPizzaingredient(): Collection
    {
        return $this->pizzaingredient;
    }

    public function addPizzaingredient(PizzaIngredient $pizzaingredient): self
    {
        if (!$this->pizzaingredient->contains($pizzaingredient)) {
            $this->pizzaingredient[] = $pizzaingredient;
        }

        return $this;
    }

    public function removePizzaingredient(PizzaIngredient $pizzaingredient): self
    {
        $this->pizzaingredient->removeElement($pizzaingredient);

        return $this;
    }

    /**
     * @return Collection<int, pizzacart>
     */
    public function getPizzaCart(): Collection
    {
        return $this->pizzaCart;
    }

    public function addPizzaCart(PizzaCart $pizzaCart): self
    {
        if (!$this->pizzaCart->contains($pizzaCart)) {
            $this->pizzaCart[] = $pizzaCart;
        }

        return $this;
    }

    public function removePizzaCart(PizzaCart $pizzaCart): self
    {
        $this->pizzaCart->removeElement($pizzaCart);

        return $this;
    }

    /**
     * @return Collection<int, pizzamenu>
     */
    public function getPizzaMenu(): Collection
    {
        return $this->PizzaMenu;
    }

    public function addPizzaMenu(PizzaMenu $pizzaMenu): self
    {
        if (!$this->PizzaMenu->contains($pizzaMenu)) {
            $this->PizzaMenu[] = $pizzaMenu;
        }

        return $this;
    }

    public function removePizzaMenu(PizzaMenu $pizzaMenu): self
    {
        $this->PizzaMenu->removeElement($pizzaMenu);

        return $this;
    }
}
