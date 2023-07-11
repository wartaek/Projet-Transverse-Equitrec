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
    
    #[ORM\Column(nullable: true)]
    #[Groups(['json'])]
    private ?int $val_penalite = null;

    #[ORM\OneToMany(mappedBy: 'penalite', targetEntity: Note::class)]
    private Collection $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

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

    public function getValPenalite(): ?int
    {
        return $this->val_penalite;
    }

    public function setValPenalite(?int $val_penalite): self
    {
        $this->val_penalite = $val_penalite;

        return $this;
    }

    public function __toString()
    {
        return $this->libellePenalite;
    }
    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setPenalite($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getPenalite() === $this) {
                $note->setPenalite(null);
            }
        }

        return $this;
    }
}
