<?php

namespace App\Entity;

use App\Repository\BlogCommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogCommentRepository::class)]
class BlogComment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9999)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'blogComments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BlogPost $post = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPost(): ?BlogPost
    {
        return $this->post;
    }

    public function setPost(?BlogPost $post): self
    {
        $this->post = $post;

        return $this;
    }
}
