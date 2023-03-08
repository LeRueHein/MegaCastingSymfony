<?php

namespace App\Entity;

use App\Repository\ConseilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConseilRepository::class)]
#[ORM\Table(name: "Conseil")]
class Conseil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 255, name: 'Libel')]
    private ?string $libel = null;

    #[ORM\Column(length: 3000, name: 'Contenu')]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibel(): ?string
    {
        return $this->libel;
    }

    public function setLibel(string $libel): self
    {
        $this->libel = $libel;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
}
