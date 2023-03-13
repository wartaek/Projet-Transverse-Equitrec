<?php

namespace App\Entity;

use App\Repository\TypeNoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeNoteRepository::class)]
class TypeNote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $libelleTypeNote = null;

    #[ORM\ManyToMany(targetEntity: NoteTotal::class, inversedBy: 'typeNotes')]
    private Collection $noteTotal;

    public function __construct()
    {
        $this->noteTotal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeNote(): ?string
    {
        return $this->libelleTypeNote;
    }

    public function setLibelleTypeNote(?string $libelleTypeNote): self
    {
        $this->libelleTypeNote = $libelleTypeNote;

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
}
