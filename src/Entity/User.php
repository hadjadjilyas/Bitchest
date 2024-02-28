<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert; /* pour les annotations de validation */

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
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

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Wallet $hasWallet = null;

    #[ORM\ManyToMany(targetEntity: Crypto::class, inversedBy: 'users')]
    private Collection $ownedCryptos;

    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'user', cascade: ['remove'])]
    private Collection $transactions;


    public function __construct()
    {
        $this->ownedCryptos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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

    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getHasWallet(): ?Wallet
    {
        return $this->hasWallet;
    }

    public function setHasWallet(?Wallet $hasWallet): static
    {
        $this->hasWallet = $hasWallet;

        return $this;
    }

    /**
     * @return Collection<int, Crypto>
     */
    public function getOwnedCryptos(): Collection
    {
        return $this->ownedCryptos;
    }

    public function addOwnedCrypto(Crypto $ownedCrypto): static
    {
        if (!$this->ownedCryptos->contains($ownedCrypto)) {
            $this->ownedCryptos->add($ownedCrypto);
        }

        return $this;
    }

    public function removeOwnedCrypto(Crypto $ownedCrypto): static
    {
        $this->ownedCryptos->removeElement($ownedCrypto);

        return $this;
    }
    
}
