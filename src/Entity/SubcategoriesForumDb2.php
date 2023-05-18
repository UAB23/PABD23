<?php

namespace App\Entity;

use App\Repository\SubcategoriesForumDb2Repository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubcategoriesForumDb2Repository::class)]
class SubcategoriesForumDb2
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

    #[ORM\Column]
    private ?int $approved = null;

    #[ORM\Column]
    private ?int $id_user = null;

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

    public function getApproved(): ?int
    {
        return $this->approved;
    }

    public function setApproved(int $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
