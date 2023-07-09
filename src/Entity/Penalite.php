<?php

namespace App\Entity;

use App\Repository\PenaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PenaliteRepository::class)]
class Penalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['json'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['json'])]
    private ?string $libellePenalite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'penalite', cascade: ['persist', 'remove'])]
    private ?Note $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePenalite(): ?string
    {
        return $this->libellePenalite;
    }

    public function setLibellePenalite(string $libellePenalite): self
    {
        $this->libellePenalite = $libellePenalite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return $this->libellePenalite;
    }

    public function getNote(): ?Note
    {
        return $this->note;
    }

    public function setNote(?Note $note): self
    {
        // unset the owning side of the relation if necessary
        if ($note === null && $this->note !== null) {
            $this->note->setPenalite(null);
        }

        // set the owning side of the relation if necessary
        if ($note !== null && $note->getPenalite() !== $this) {
            $note->setPenalite($this);
        }

        $this->note = $note;

        return $this;
    }
}
