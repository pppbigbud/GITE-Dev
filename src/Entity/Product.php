<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    #[ORM\Column(length: 255)]
=======
    #[ORM\Column(length: 50)]
>>>>>>> 411be73 (easy admin install + firstEntity)
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $priceHT = null;

<<<<<<< HEAD
    #[ORM\Column]
    private ?\DateTimeImmutable $created_At = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Img $img = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Categorie $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Caracteristique $caracteristique = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Tva $tva = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Fournisseur $fournisseur = null;
=======
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendor = null;

    #[ORM\Column]
    private ?float $tva = null;

    #[ORM\Column(nullable: true)]
    private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;
>>>>>>> 411be73 (easy admin install + firstEntity)

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceHT(): ?float
    {
        return $this->priceHT;
    }

    public function setPriceHT(float $priceHT): self
    {
        $this->priceHT = $priceHT;

        return $this;
    }

<<<<<<< HEAD
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_At;
    }

    public function setCreatedAt(\DateTimeImmutable $created_At): self
    {
        $this->created_At = $created_At;
=======
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
>>>>>>> 411be73 (easy admin install + firstEntity)

        return $this;
    }

<<<<<<< HEAD
    public function getImg(): ?Img
=======
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImg(): ?string
>>>>>>> 411be73 (easy admin install + firstEntity)
    {
        return $this->img;
    }

<<<<<<< HEAD
    public function setImg(?Img $img): self
=======
    public function setImg(?string $img): self
>>>>>>> 411be73 (easy admin install + firstEntity)
    {
        $this->img = $img;

        return $this;
    }

<<<<<<< HEAD
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
=======
    public function getVendor(): ?string
    {
        return $this->vendor;
    }

    public function setVendor(?string $vendor): self
    {
        $this->vendor = $vendor;
>>>>>>> 411be73 (easy admin install + firstEntity)

        return $this;
    }

<<<<<<< HEAD
    public function getCaracteristique(): ?Caracteristique
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(?Caracteristique $caracteristique): self
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getTva(): ?Tva
=======
    public function getTva(): ?float
>>>>>>> 411be73 (easy admin install + firstEntity)
    {
        return $this->tva;
    }

<<<<<<< HEAD
    public function setTva(?Tva $tva): self
=======
    public function setTva(float $tva): self
>>>>>>> 411be73 (easy admin install + firstEntity)
    {
        $this->tva = $tva;

        return $this;
    }

<<<<<<< HEAD
    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;
=======
    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;
>>>>>>> 411be73 (easy admin install + firstEntity)

        return $this;
    }
}
