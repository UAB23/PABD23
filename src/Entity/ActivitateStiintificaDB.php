<?php

namespace App\Entity;

use App\Repository\ActivitateStiintificaDBRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitateStiintificaDBRepository::class)]
class ActivitateStiintificaDB
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tip = null;

    #[ORM\Column(length: 1000)]
    private ?string $descriere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTip(): ?int
    {
        return $this->tip;
    }

    public function setTip(int $tip): self
    {
        $this->tip = $tip;

        return $this;
    }

    public function getDescriere(): ?string
    {
        return $this->descriere;
    }

    public function setDescriere(string $descriere): self
    {
        $this->descriere = $descriere;

        return $this;
    }
}
