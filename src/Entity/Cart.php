<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_cart;

    #[ORM\ManyToMany(targetEntity: PizzaCart::class, inversedBy: 'carts')]
    private $PizzaCart;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Cart')]
    private $user;

    public function __construct()
    {
        $this->PizzaCart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCart(): ?\DateTimeInterface
    {
        return $this->date_cart;
    }

    public function setDateCart(?\DateTimeInterface $date_cart): self
    {
        $this->date_cart = $date_cart;

        return $this;
    }

    /**
     * @return Collection<int, pizzacart>
     */
    public function getPizzaCart(): Collection
    {
        return $this->PizzaCart;
    }

    public function addPizzaCart(PizzaCart $pizzaCart): self
    {
        if (!$this->PizzaCart->contains($pizzaCart)) {
            $this->PizzaCart[] = $pizzaCart;
        }

        return $this;
    }

    public function removePizzaCart(PizzaCart $pizzaCart): self
    {
        $this->PizzaCart->removeElement($pizzaCart);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
