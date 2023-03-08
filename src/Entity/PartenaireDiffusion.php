<?php

namespace App\Entity;

use App\Repository\PartenaireDiffusionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenaireDiffusionRepository::class)]
#[ORM\Table(name: "PartenaireDiffusion")]
class PartenaireDiffusion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 255, name: 'Login')]
    private ?string $login = null;

    #[ORM\Column(length: 255, name: 'Password')]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
