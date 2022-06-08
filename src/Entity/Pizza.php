<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
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
}
