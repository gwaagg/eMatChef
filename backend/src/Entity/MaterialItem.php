<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity]
#[ORM\Table(name: 'material_item')]
class MaterialItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private int $department_id;

    #[ORM\Column(type: 'integer')]
    private int $artnr;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $quantityunit = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $material = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $memo = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $lieferant = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $kaufdat = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $kaufpreis = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $EAN = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $beschreibung = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $liqdat = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $deletet = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $dokumente = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $bezugsort = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $hersteller = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $picture = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $sizehigh = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $sizewidth = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $sizedepth = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $sizeunit = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $weight = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $weightunit = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $kategorie_id = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sub_kategorie_id = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $standort_id = null;

    // --- Getter/Setter ---

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function setName(string $name): static { $this->name = $name; return $this; }

    public function getQuantity(): ?int { return $this->quantity; }
    public function setQuantity(?int $quantity): static { $this->quantity = $quantity; return $this; }

    public function getQuantityunit(): ?int { return $this->quantityunit; }
    public function setQuantityunit(?int $quantityunit): static { $this->quantityunit = $quantityunit; return $this; }

    public function getSizehigh(): ?float { return $this->sizehigh; }
    public function setSizehigh(?float $sizehigh): static { $this->sizehigh = $sizehigh; return $this; }

    public function getSizewidth(): ?float { return $this->sizewidth; }
    public function setSizewidth(?float $sizewidth): static { $this->sizewidth = $sizewidth; return $this; }

    public function getSizedepth(): ?float { return $this->sizedepth; }
    public function setSizedepth(?float $sizedepth): static { $this->sizedepth = $sizedepth; return $this; }

    public function getSizeunit(): ?float { return $this->sizeunit; }
    public function setSizeunit(?float $sizeunit): static { $this->sizeunit = $sizeunit; return $this; }

    public function getMaterial(): ?string { return $this->material; }
    public function setMaterial(?string $material): static { $this->material = $material; return $this; }

    // Weitere Getter/Setter bei Bedarf generieren
}
