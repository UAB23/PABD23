<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titlu = null;

    #[ORM\Column(length: 255)]
    private ?string $descriere = null;

    #[ORM\Column]
    private ?int $pret_bilet = null;

    #[ORM\Column(length: 255)]
    private ?string $locatie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitlu(): ?string
    {
        return $this->titlu;
    }

    public function setTitlu(string $titlu): static
    {
        $this->titlu = $titlu;

        return $this;
    }

    public function getDescriere(): ?string
    {
        return $this->descriere;
    }

    public function setDescriere(string $descriere): static
    {
        $this->descriere = $descriere;

        return $this;
    }

    public function getPretBilet(): ?int
    {
        return $this->pret_bilet;
    }

    public function setPretBilet(int $pret_bilet): static
    {
        $this->pret_bilet = $pret_bilet;

        return $this;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): static
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }
}
