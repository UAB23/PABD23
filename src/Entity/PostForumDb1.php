<?php

namespace App\Entity;

use App\Repository\PostForumDb1Repository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostForumDb1Repository::class)]
class PostForumDb1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_subcateg = null;

    #[ORM\Column]
    private ?int $id_user = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timp = null;

    #[ORM\Column]
    private ?int $approved = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSubcateg(): ?int
    {
        return $this->id_subcateg;
    }

    public function setIdSubcateg(int $id_subcateg): self
    {
        $this->id_subcateg = $id_subcateg;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

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
}
