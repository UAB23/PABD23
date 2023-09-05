<?php

namespace App\Entity;

use App\Repository\BasimFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BasimFormRepository::class)]
class BasimForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'basimForm', targetEntity: SubBasimForm::class)]
    private Collection $subCategory;

    public function __construct()
    {
        $this->subCategory = new ArrayCollection();
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

    /**
     * @return Collection<int, SubBasimForm>
     */
    public function getSubCategory(): Collection
    {
        return $this->subCategory;
    }

    public function addSubCategory(SubBasimForm $subCategory): self
    {
        if (!$this->subCategory->contains($subCategory)) {
            $this->subCategory->add($subCategory);
            $subCategory->setBasimForm($this);
        }

        return $this;
    }

    public function removeSubCategory(SubBasimForm $subCategory): self
    {
        if ($this->subCategory->removeElement($subCategory)) {
            // set the owning side to null (unless already changed)
            if ($subCategory->getBasimForm() === $this) {
                $subCategory->setBasimForm(null);
            }
        }

        return $this;
    }
}
