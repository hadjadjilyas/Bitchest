<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_transaction = null;

    #[ORM\Column]
    private ?float $quantity = null;

    #[ORM\Column]
    private ?float $transaction_amount = null;

    #[ORM\Column(length: 255)]
    private ?string $transaction_type = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Cryptomonaie = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?Crypto $crypto = null;


    #[ORM\PrePersist]
    public function prePersist(): void
    {
        if ($this->date_transaction === null) {
            $this->date_transaction = new \DateTimeImmutable();
        }
    }

    public function __construct(){
        $this->date_transaction = new \DateTimeImmutable;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->date_transaction;
    }

    public function setDateTransaction(\DateTimeInterface $date_transaction): static
    {
        $this->date_transaction = $date_transaction;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTransactionAmount(): ?float
    {
        return $this->transaction_amount;
    }

    public function setTransactionAmount(float $transaction_amount): static
    {
        $this->transaction_amount = $transaction_amount;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transaction_type;
    }

    public function setTransactionType(string $transaction_type): static
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCryptomonaie(): ?string
    {
        return $this->Cryptomonaie;
    }

    public function setCryptomonaie(string $Cryptomonaie): static
    {
        $this->Cryptomonaie = $Cryptomonaie;

        return $this;
    }

    public function getCrypto(): ?Crypto
    {
        return $this->crypto;
    }

    public function setCrypto(?crypto $crypto): static
    {
        $this->crypto = $crypto;

        return $this;
    }
}
