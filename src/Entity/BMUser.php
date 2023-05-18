<?php

namespace App\Entity;

use App\Repository\BMUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BMUserRepository::class)]
class BMUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nume = null;

    #[ORM\Column(length: 255)]
    private ?string $ocupatie = null;

    #[ORM\Column]
    private ?int $anulnasterii = null;

    #[ORM\Column(length: 255)]
    private ?string $resedinta = null;

    #[ORM\ManyToMany(targetEntity: BMAptitudine::class)]
    private Collection $aptitudini;

    public function __construct()
    {
        $this->aptitudini = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNume(): ?string
    {
        return $this->nume;
    }

    public function setNume(string $nume): self
    {
        $this->nume = $nume;

        return $this;
    }

    public function getOcupatie(): ?string
    {
        return $this->ocupatie;
    }

    public function setOcupatie(string $ocupatie): self
    {
        $this->ocupatie = $ocupatie;

        return $this;
    }

    public function getAnulnasterii(): ?int
    {
        return $this->anulnasterii;
    }

    public function setAnulnasterii(int $anulnasterii): self
    {
        $this->anulnasterii = $anulnasterii;

        return $this;
    }

    public function getResedinta(): ?string
    {
        return $this->resedinta;
    }

    public function setResedinta(string $resedinta): self
    {
        $this->resedinta = $resedinta;

        return $this;
    }

    /**
     * @return Collection<int, BMAptitudine>
     */
    public function getAptitudini(): Collection
    {
        return $this->aptitudini;
    }

    public function addAptitudini(BMAptitudine $aptitudini): self
    {
        if (!$this->aptitudini->contains($aptitudini)) {
            $this->aptitudini->add($aptitudini);
        }

        return $this;
    }

    public function removeAptitudini(BMAptitudine $aptitudini): self
    {
        $this->aptitudini->removeElement($aptitudini);

        return $this;
    }
}
