<?php

namespace App\Entity;

use App\Repository\CiviliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CiviliteRepository::class)]
#[ORM\Table(name: "Civilite")]
class Civilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 255, name: 'LibelShort')]
    private ?string $libelShort = null;

    #[ORM\Column(length: 255, name: 'LibelLong')]
    private ?string $libelLong = null;

    #[ORM\ManyToMany(targetEntity: OffreCasting::class, mappedBy: 'civilites')]

    private Collection $offreCastings;

    public function __construct()
    {
        $this->offreCastings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelShort(): ?string
    {
        return $this->libelShort;
    }

    public function setLibelShort(string $libelShort): self
    {
        $this->libelShort = $libelShort;

        return $this;
    }

    public function getLibelLong(): ?string
    {
        return $this->libelLong;
    }

    public function setLibelLong(string $libelLong): self
    {
        $this->libelLong = $libelLong;

        return $this;
    }

    /**
     * @return Collection<int, OffreCasting>
     */
    public function getOffreCastings(): Collection
    {
        return $this->offreCastings;
    }

    public function addOffreCasting(OffreCasting $offreCasting): self
    {
        if (!$this->offreCastings->contains($offreCasting)) {
            $this->offreCastings->add($offreCasting);
            $offreCasting->addCivilite($this);
        }

        return $this;
    }

    public function removeOffreCasting(OffreCasting $offreCasting): self
    {
        if ($this->offreCastings->removeElement($offreCasting)) {
            $offreCasting->removeCivilite($this);
        }

        return $this;
    }
}
