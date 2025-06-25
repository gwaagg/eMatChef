<?php
// backend/src/Entity/Organisation.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
class Organisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:read'])] // ⬅ wichtig!
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read'])] // ⬅ wichtig!
    private string $name;

    #[ORM\Column(length: 20)]
    #[Groups(['user:read'])] // ⬅ orgCode sichtbar machen!
    private string $orgCode;

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getOrgCode(): string { return $this->orgCode; }

    public function setName(string $name): static {
        $this->name = $name;
        return $this;
    }

    public function setOrgCode(string $orgCode): static {
        $this->orgCode = $orgCode;
        return $this;
    }
}
