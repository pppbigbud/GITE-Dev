<?php

namespace App\Entity;

use App\Repository\TvaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TvaRepository::class)]
class Tva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $taux_tva = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTauxTva(): ?float
    {
        return $this->taux_tva;
    }

    public function setTauxTva(float $taux_tva): self
    {
        $this->taux_tva = $taux_tva;

        return $this;
    }
}
