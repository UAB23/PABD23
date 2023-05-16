<?php

namespace App\Entity;

use App\Repository\SubcategoriesForumDb1Repository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubcategoriesForumDb1Repository::class)]
class SubcategoriesForumDb1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_categ = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCateg(): ?int
    {
        return $this->id_categ;
    }

    public function setIdCateg(int $id_categ): self
    {
        $this->id_categ = $id_categ;

        return $this;
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

    public function getTimp(): ?\DateTimeInterface
    {
        return $this->timp;
    }

    public function setTimp(\DateTimeInterface $timp): self
    {
        $this->timp = $timp;

        return $this;
    }
}
