<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $name_menu;

    #[ORM\Column(type: 'text', nullable: true)]
    private $desc_menu;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $img_menu;

    #[ORM\Column(type: 'float', nullable: true)]
    private $price_menu;

    #[ORM\ManyToMany(targetEntity: PizzaMenu::class, inversedBy: 'menus')]
    private $PizzaMenu;

    #[ORM\ManyToMany(targetEntity: DrinkMenu::class, inversedBy: 'menus')]
    private $DrinkMenu;

    public function __construct()
    {
        $this->PizzaMenu = new ArrayCollection();
        $this->DrinkMenu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMenu(): ?string
    {
        return $this->name_menu;
    }

    public function setNameMenu(?string $name_menu): self
    {
        $this->name_menu = $name_menu;

        return $this;
    }

    public function getDescMenu(): ?string
    {
        return $this->desc_menu;
    }

    public function setDescMenu(?string $desc_menu): self
    {
        $this->desc_menu = $desc_menu;

        return $this;
    }

    public function getImgMenu(): ?string
    {
        return $this->img_menu;
    }

    public function setImgMenu(?string $img_menu): self
    {
        $this->img_menu = $img_menu;

        return $this;
    }

    public function getPriceMenu(): ?float
    {
        return $this->price_menu;
    }

    public function setPriceMenu(?float $price_menu): self
    {
        $this->price_menu = $price_menu;

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

    /**
     * @return Collection<int, drinkmenu>
     */
    public function getDrinkMenu(): Collection
    {
        return $this->DrinkMenu;
    }

    public function addDrinkMenu(DrinkMenu $drinkMenu): self
    {
        if (!$this->DrinkMenu->contains($drinkMenu)) {
            $this->DrinkMenu[] = $drinkMenu;
        }

        return $this;
    }

    public function removeDrinkMenu(DrinkMenu $drinkMenu): self
    {
        $this->DrinkMenu->removeElement($drinkMenu);

        return $this;
    }
}
