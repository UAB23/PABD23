<?php

namespace App\Entity;

use App\Repository\SubBasimFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubBasimFormRepository::class)]
class SubBasimForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'subCategory')]
    private ?BasimForm $basimForm = null;

    #[ORM\OneToMany(mappedBy: 'subBasimForm', targetEntity: PostBasimForm::class)]
    private Collection $PostBasimForm;

    public function __construct()
    {
        $this->PostBasimForm = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBasimForm(): ?BasimForm
    {
        return $this->basimForm;
    }

    public function setBasimForm(?BasimForm $basimForm): self
    {
        $this->basimForm = $basimForm;

        return $this;
    }

    /**
     * @return Collection<int, PostBasimForm>
     */
    public function getPostBasimForm(): Collection
    {
        return $this->PostBasimForm;
    }

    public function addPostBasimForm(PostBasimForm $postBasimForm): self
    {
        if (!$this->PostBasimForm->contains($postBasimForm)) {
            $this->PostBasimForm->add($postBasimForm);
            $postBasimForm->setSubBasimForm($this);
        }

        return $this;
    }

    public function removePostBasimForm(PostBasimForm $postBasimForm): self
    {
        if ($this->PostBasimForm->removeElement($postBasimForm)) {
            // set the owning side to null (unless already changed)
            if ($postBasimForm->getSubBasimForm() === $this) {
                $postBasimForm->setSubBasimForm(null);
            }
        }

        return $this;
    }
}
