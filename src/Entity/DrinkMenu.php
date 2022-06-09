<?php

namespace App\Entity;

use App\Repository\DrinkMenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DrinkMenuRepository::class)]
class DrinkMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $qunatite;

    #[ORM\ManyToMany(targetEntity: Drink::class, mappedBy: 'DrinkMenu')]
    private $drinks;

    #[ORM\ManyToMany(targetEntity: Menu::class, mappedBy: 'DrinkMenu')]
    private $menus;

    public function __construct()
    {
        $this->drinks = new ArrayCollection();
        $this->menus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQunatite(): ?int
    {
        return $this->qunatite;
    }

    public function setQunatite(?int $qunatite): self
    {
        $this->qunatite = $qunatite;

        return $this;
    }

    /**
     * @return Collection<int, Drink>
     */
    public function getDrinks(): Collection
    {
        return $this->drinks;
    }

    public function addDrink(Drink $drink): self
    {
        if (!$this->drinks->contains($drink)) {
            $this->drinks[] = $drink;
            $drink->addDrinkMenu($this);
        }

        return $this;
    }

    public function removeDrink(Drink $drink): self
    {
        if ($this->drinks->removeElement($drink)) {
            $drink->removeDrinkMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->addDrinkMenu($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removeDrinkMenu($this);
        }

        return $this;
    }
}
