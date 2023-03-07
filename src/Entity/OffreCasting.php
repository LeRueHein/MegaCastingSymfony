<?php

namespace App\Entity;

use App\Repository\OffreCastingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreCastingRepository::class)]
class OffreCasting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libel = null;

    #[ORM\Column(length: 3000)]
    private ?string $reference = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $parutionDateTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $offreDateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $offreDateEnd = null;

    #[ORM\Column(length: 255)]
    private ?string $localisation = null;

    #[ORM\ManyToMany(targetEntity: Civilite::class, inversedBy: 'offreCastings')]
    private Collection $civilite;

    #[ORM\ManyToOne(inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'offreCastings')]
    private ?TypeContrat $typecontrat = null;

    #[ORM\ManyToMany(targetEntity: Metier::class, inversedBy: 'offreCastings')]
    private Collection $metier;

    public function __construct()
    {
        $this->civilite = new ArrayCollection();
        $this->metier = new ArrayCollection();
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getParutionDateTime(): ?\DateTimeInterface
    {
        return $this->parutionDateTime;
    }

    public function setParutionDateTime(\DateTimeInterface $parutionDateTime): self
    {
        $this->parutionDateTime = $parutionDateTime;

        return $this;
    }

    public function getOffreDateStart(): ?\DateTimeInterface
    {
        return $this->offreDateStart;
    }

    public function setOffreDateStart(\DateTimeInterface $offreDateStart): self
    {
        $this->offreDateStart = $offreDateStart;

        return $this;
    }

    public function getOffreDateEnd(): ?\DateTimeInterface
    {
        return $this->offreDateEnd;
    }

    public function setOffreDateEnd(\DateTimeInterface $offreDateEnd): self
    {
        $this->offreDateEnd = $offreDateEnd;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * @return Collection<int, Civilite>
     */
    public function getCivilite(): Collection
    {
        return $this->civilite;
    }

    public function addCivilite(Civilite $civilite): self
    {
        if (!$this->civilite->contains($civilite)) {
            $this->civilite->add($civilite);
        }

        return $this;
    }

    public function removeCivilite(Civilite $civilite): self
    {
        $this->civilite->removeElement($civilite);

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTypecontrat(): ?TypeContrat
    {
        return $this->typecontrat;
    }

    public function setTypecontrat(?TypeContrat $typecontrat): self
    {
        $this->typecontrat = $typecontrat;

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetier(): Collection
    {
        return $this->metier;
    }

    public function addMetier(Metier $metier): self
    {
        if (!$this->metier->contains($metier)) {
            $this->metier->add($metier);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): self
    {
        $this->metier->removeElement($metier);

        return $this;
    }
}
