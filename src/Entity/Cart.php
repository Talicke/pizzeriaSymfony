<?php

namespace App\Entity;

use App\Repository\CartRepository;
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
}
