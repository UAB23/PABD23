<?php

namespace App\Entity;

use App\Repository\SportsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportsRepository::class)]
class Sports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $basketball = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $american_football = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hockey = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $baseball = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $formula1 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasketball(): ?string
    {
        return $this->basketball;
    }

    public function setBasketball(?string $basketball): self
    {
        $this->basketball = $basketball;

        return $this;
    }

    public function getAmericanFootball(): ?string
    {
        return $this->american_football;
    }

    public function setAmericanFootball(?string $american_football): self
    {
        $this->american_football = $american_football;

        return $this;
    }

    public function getHockey(): ?string
    {
        return $this->hockey;
    }

    public function setHockey(?string $hockey): self
    {
        $this->hockey = $hockey;

        return $this;
    }

    public function getBaseball(): ?string
    {
        return $this->baseball;
    }

    public function setBaseball(?string $baseball): self
    {
        $this->baseball = $baseball;

        return $this;
    }

    public function getFormula1(): ?string
    {
        return $this->formula1;
    }

    public function setFormula1(?string $formula1): self
    {
        $this->formula1 = $formula1;

        return $this;
    }
}
