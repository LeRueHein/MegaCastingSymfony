<?php

namespace App\Entity;

use App\Repository\MetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierRepository::class)]
#[ORM\Table(name: "Metier")]
class Metier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 255, name: 'Libel')]
    private ?string $libel = null;

    #[ORM\Column(length: 3000, name: 'Description')]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: OffreCasting::class, mappedBy: 'metier')]
    private Collection $offreCastings;

    #[ORM\ManyToOne(targetEntity: DomaineMetier::class, inversedBy: 'metiers')]
    #[ORM\JoinColumn(name: 'IdentifiantDomaineMetier', referencedColumnName: 'Identifiant', nullable: false)]
    private ?DomaineMetier $domaineMetier = null;

    public function __construct()
    {
        $this->offreCastings = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $offreCasting->addMetier($this);
        }

        return $this;
    }

    public function removeOffreCasting(OffreCasting $offreCasting): self
    {
        if ($this->offreCastings->removeElement($offreCasting)) {
            $offreCasting->removeMetier($this);
        }

        return $this;
    }

    public function getDomaineMetier(): ?DomaineMetier
    {
        return $this->domaineMetier;
    }

    public function setDomaineMetier(?DomaineMetier $domaineMetier): self
    {
        $this->domaineMetier = $domaineMetier;

        return $this;
    }
    public function __toString(): string
    {
        return $this->libel;
    }
}
