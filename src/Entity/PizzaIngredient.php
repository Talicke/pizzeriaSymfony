<?php

namespace App\Entity;

use App\Repository\PizzaIngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaIngredientRepository::class)]
class PizzaIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $quantite;

    #[ORM\ManyToMany(targetEntity: Pizza::class, mappedBy: 'pizzaingredient')]
    private $id_pizza;

    #[ORM\ManyToMany(targetEntity: Ingredient::class, mappedBy: 'pizzaingredient')]
    private $ingredients;

    public function __construct()
    {
        $this->id_pizza = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * @return Collection<int, Pizza>
     */
    public function getIdPizza(): Collection
    {
        return $this->id_pizza;
    }

    public function addIdPizza(Pizza $idPizza): self
    {
        if (!$this->id_pizza->contains($idPizza)) {
            $this->id_pizza[] = $idPizza;
            $idPizza->addPizzaingredient($this);
        }

        return $this;
    }

    public function removeIdPizza(Pizza $idPizza): self
    {
        if ($this->id_pizza->removeElement($idPizza)) {
            $idPizza->removePizzaingredient($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->addPizzaingredient($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            $ingredient->removePizzaingredient($this);
        }

        return $this;
    }
}
