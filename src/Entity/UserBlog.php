<?php

namespace App\Entity;

use App\Repository\UserBlogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserBlogRepository::class)]
class UserBlog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
   #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $profession;

    #[ORM\Column(type: 'string', length: 255)]
    private $message;

   #[ORM\Column(type: 'string', length: 255)]
    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }
 public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
      public function getTitle(): ?string
        {
            return $this->title;
        }

        public function setTitle(string $title): self
        {
            $this->title = $title;

            return $this;
        }
}