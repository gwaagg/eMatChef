<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'material_item')]
class MaterialItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $material = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'department_id', referencedColumnName: 'id', nullable: false)]
    private ?Department $department = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'kategorie_id', referencedColumnName: 'id', nullable: true)]
    private ?Kategorie $kategorie = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'standort_id', referencedColumnName: 'id', nullable: true)]
    private ?Standort $standort = null;

    // Getter und Setter

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): static
    {
        $this->material = $material;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): static
    {
        $this->department = $department;
        return $this;
    }

    public function getKategorie(): ?Kategorie
    {
        return $this->kategorie;
    }

    public function setKategorie(?Kategorie $kategorie): static
    {
        $this->kategorie = $kategorie;
        return $this;
    }

    public function getStandort(): ?Standort
    {
        return $this->standort;
    }

    public function setStandort(?Standort $standort): static
    {
        $this->standort = $standort;
        return $this;
    }
}
