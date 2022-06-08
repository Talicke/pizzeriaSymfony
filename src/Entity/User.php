<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $name_user;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $first_name_user;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $mail_user;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $password_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameUser(): ?string
    {
        return $this->name_user;
    }

    public function setNameUser(?string $name_user): self
    {
        $this->name_user = $name_user;

        return $this;
    }

    public function getFirstNameUser(): ?string
    {
        return $this->first_name_user;
    }

    public function setFirstNameUser(?string $first_name_user): self
    {
        $this->first_name_user = $first_name_user;

        return $this;
    }

    public function getMailUser(): ?string
    {
        return $this->mail_user;
    }

    public function setMailUser(?string $mail_user): self
    {
        $this->mail_user = $mail_user;

        return $this;
    }

    public function getPasswordUser(): ?string
    {
        return $this->password_user;
    }

    public function setPasswordUser(?string $password_user): self
    {
        $this->password_user = $password_user;

        return $this;
    }
}