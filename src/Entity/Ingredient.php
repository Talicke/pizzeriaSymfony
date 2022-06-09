<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $name_ingredient;

    #[ORM\Column(type: 'text', nullable: true)]
    private $desc_ingredient;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $img_ingredient;

    #[ORM\ManyToMany(targetEntity: PizzaIngredient::class, inversedBy: 'ingredients')]
    private $pizzaingredient;

    public function __construct()
    {
        $this->pizzaingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameIngredient(): ?string
    {
        return $this->name_ingredient;
    }

    public function setNameIngredient(?string $name_ingredient): self
    {
        $this->name_ingredient = $name_ingredient;

        return $this;
    }

    public function getDescIngredient(): ?string
    {
        return $this->desc_ingredient;
    }

    public function setDescIngredient(?string $desc_ingredient): self
    {
        $this->desc_ingredient = $desc_ingredient;

        return $this;
    }

    public function getImgIngredient(): ?string
    {
        return $this->img_ingredient;
    }

    public function setImgIngredient(?string $img_ingredient): self
    {
        $this->img_ingredient = $img_ingredient;

        return $this;
    }

    /**
     * @return Collection<int, PizzaIngredient>
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
}
