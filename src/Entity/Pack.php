<?php

namespace App\Entity;

use App\Repository\PackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackRepository::class)]
#[ORM\Table(name: "Pack")]
class Pack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 255, name: 'Libel')]
    private ?string $libel = null;


    #[ORM\Column(name: 'NombreOffre')]
    private ?int $nombreOffre = null;


    #[ORM\Column(name: 'Tarif')]
    private ?int $tarif = null;

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

    public function getNombreOffre(): ?int
    {
        return $this->nombreOffre;
    }

    public function setNombreOffre(int $nombreOffre): self
    {
        $this->nombreOffre = $nombreOffre;

        return $this;
    }

    public function getTarif(): ?int
    {
        return $this->tarif;
    }

    public function setTarif(int $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }
}
