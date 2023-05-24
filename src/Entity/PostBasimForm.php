<?php

namespace App\Entity;

use App\Repository\PostBasimFormRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostBasimFormRepository::class)]
class PostBasimForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\ManyToOne(inversedBy: 'PostBasimForm')]
    private ?SubBasimForm $subBasimForm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getSubBasimForm(): ?SubBasimForm
    {
        return $this->subBasimForm;
    }

    public function setSubBasimForm(?SubBasimForm $subBasimForm): self
    {
        $this->subBasimForm = $subBasimForm;

        return $this;
    }
}
