<?php

namespace App\Entity;

use App\Repository\ActivitateDidacticaDBRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitateDidacticaDBRepository::class)]
class ActivitateDidacticaDB
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $descriere = null;

    public function getId(): ?int
    {
        return $this->id;
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
