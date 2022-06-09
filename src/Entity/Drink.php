<?php

namespace App\Entity;

use App\Repository\DrinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DrinkRepository::class)]
class Drink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $name_drink;

    #[ORM\Column(type: 'float', nullable: true)]
    private $price_drink;

    #[ORM\Column(type: 'text', nullable: true)]
    private $desc_drink;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $img_drink;

    #[ORM\ManyToMany(targetEntity: drinkmenu::class, inversedBy: 'drinks')]
    private $DrinkMenu;

    public function __construct()
    {
        $this->DrinkMenu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDrink(): ?string
    {
        return $this->name_drink;
    }

    public function setNameDrink(?string $name_drink): self
    {
        $this->name_drink = $name_drink;

        return $this;
    }

    public function getPriceDrink(): ?float
    {
        return $this->price_drink;
    }

    public function setPriceDrink(?float $price_drink): self
    {
        $this->price_drink = $price_drink;

        return $this;
    }

    public function getDescDrink(): ?string
    {
        return $this->desc_drink;
    }

    public function setDescDrink(?string $desc_drink): self
    {
        $this->desc_drink = $desc_drink;

        return $this;
    }

    public function getImgDrink(): ?string
    {
        return $this->img_drink;
    }

    public function setImgDrink(?string $img_drink): self
    {
        $this->img_drink = $img_drink;

        return $this;
    }

    /**
     * @return Collection<int, drinkmenu>
     */
    public function getDrinkMenu(): Collection
    {
        return $this->DrinkMenu;
    }

    public function addDrinkMenu(drinkmenu $drinkMenu): self
    {
        if (!$this->DrinkMenu->contains($drinkMenu)) {
            $this->DrinkMenu[] = $drinkMenu;
        }

        return $this;
    }

    public function removeDrinkMenu(drinkmenu $drinkMenu): self
    {
        $this->DrinkMenu->removeElement($drinkMenu);

        return $this;
    }
}
