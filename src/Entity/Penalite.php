<?php

namespace App\Entity;

use App\Repository\PenaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PenaliteRepository::class)]
class Penalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $val = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: NoteTotal::class, inversedBy: 'penalites')]
    private Collection $noteTotal;

    public function __construct()
    {
        $this->noteTotal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getval(): ?int
    {
        return $this->val;
    }

    public function setLibellePenalite(int $val): self
    {
        $this->val = $val;

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

    /**
     * @return Collection<int, NoteTotal>
     */
    public function getNoteTotal(): Collection
    {
        return $this->noteTotal;
    }

    public function addNoteTotal(NoteTotal $noteTotal): self
    {
        if (!$this->noteTotal->contains($noteTotal)) {
            $this->noteTotal->add($noteTotal);
        }

        return $this;
    }

    public function removeNoteTotal(NoteTotal $noteTotal): self
    {
        $this->noteTotal->removeElement($noteTotal);

        return $this;
    }

    public function __toString()
    {
        return $this->val;
    }
}
