<?php

namespace App\Entity;

use App\Repository\PizzaMenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaMenuRepository::class)]
class PizzaMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $quantite;

    #[ORM\ManyToMany(targetEntity: Pizza::class, mappedBy: 'PizzaMenu')]
    private $pizzas;

    #[ORM\ManyToMany(targetEntity: Menu::class, mappedBy: 'PizzaMenu')]
    private $menus;

    public function __construct()
    {
        $this->pizzas = new ArrayCollection();
        $this->menus = new ArrayCollection();
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
    public function getPizzas(): Collection
    {
        return $this->pizzas;
    }

    public function addPizza(Pizza $pizza): self
    {
        if (!$this->pizzas->contains($pizza)) {
            $this->pizzas[] = $pizza;
            $pizza->addPizzaMenu($this);
        }

        return $this;
    }

    public function removePizza(Pizza $pizza): self
    {
        if ($this->pizzas->removeElement($pizza)) {
            $pizza->removePizzaMenu($this);
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
            $menu->addPizzaMenu($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removePizzaMenu($this);
        }

        return $this;
    }
}
