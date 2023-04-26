<?php

namespace App\Entity;

use App\Repository\OffreCastingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: OffreCastingRepository::class)]
#[ORM\Table(name: "OffreCasting")]
class OffreCasting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 255, name: 'Libel')]
    #[Groups('user')]
    private ?string $libel = null;

    #[ORM\Column(length: 3000, name: 'Reference')]
    #[Groups('user')]
    private ?string $reference = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'ParutionDateTime')]
    #[Groups('user')]
    private ?\DateTimeInterface $parutionDateTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'OffreDateStart')]
    #[Groups('user')]
    private ?\DateTimeInterface $offreDateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'OffreDateEnd')]
    #[Groups('user')]
    private ?\DateTimeInterface $offreDateEnd = null;

    #[ORM\Column(length: 255, name: 'Localisation')]
    #[Groups('user')]
    private ?string $localisation = null;

    #[ORM\Column(nullable: true)]
    #[Groups('user')]
    private ?bool $Sponso = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('user')]
    private ?string $Nivurgence = null;


    #[ORM\JoinTable(name: 'CiviliteOffreCasting')]
    #[ORM\JoinColumn(name: 'IdentifiantCivilite', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantOffreCasting', referencedColumnName: 'Identifiant')]
    #[ORM\ManyToMany(targetEntity: Civilite::class, inversedBy: 'offreCastings')]
    private Collection $civilite;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(name: 'IdentifiantClient', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne(targetEntity: TypeContrat::class, inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(name: 'IdentifiantTypeContrat', referencedColumnName: 'Identifiant', nullable: false)]
    private ?TypeContrat $typecontrat = null;



    #[ORM\JoinTable(name: 'MetierOffreCasting')]
    #[ORM\JoinColumn(name: 'IdentifiantMetier', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantOffreCasting', referencedColumnName: 'Identifiant')]
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

    public function isSponso(): ?bool
    {
        return $this->Sponso;
    }

    public function setSponso(?bool $Sponso): self
    {
        $this->Sponso = $Sponso;

        return $this;
    }

    public function getNivurgence(): ?string
    {
        return $this->Nivurgence;
    }

    public function setNivurgence(?string $Nivurgence): self
    {
        $this->Nivurgence = $Nivurgence;

        return $this;
    }
}
