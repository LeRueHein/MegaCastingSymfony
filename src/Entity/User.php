<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Serializable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface,  \Serializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numtel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\ManyToMany(targetEntity: OffreCasting::class, mappedBy: 'Postule')]
    private Collection $offreCastings;

    public function __construct()
    {
        $this->offreCastings = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(?string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }

    /**
     * @return Collection<int, OffreCasting>
     */

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize(string $data)
    {
        // TODO: Implement unserialize() method.
    }

    public function __serialize(): array
    {

        return [
            'id' => $this->id,
            'email' => $this->email,
            'roles' => $this->roles,
            'password' => $this->password,
            'isVerified' => $this->isVerified,
            'nom' => $this->nom,
            'ville' => $this->ville,
            'numtel' => $this->numtel,

        ];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->roles = $data['roles'] ?? [];
        $this->password = $data['password'] ?? null;
        $this->isVerified = $data['isVerified'] ?? false;
        $this->nom = $data['nom'] ?? null;
        $this->numtel = $data['numtel'] ?? null;
        $this->ville = $data['ville'] ?? null;

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
            $offreCasting->addPostule($this);
        }

        return $this;
    }

    public function removeOffreCasting(OffreCasting $offreCasting): self
    {
        if ($this->offreCastings->removeElement($offreCasting)) {
            $offreCasting->removePostule($this);
        }

        return $this;
    }

}
