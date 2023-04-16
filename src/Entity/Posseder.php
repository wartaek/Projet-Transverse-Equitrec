<?php

namespace App\Entity;

use App\Repository\PossederRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PossederRepository::class)]
class Posseder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $val = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: NoteTotal::class, inversedBy: 'posseders')]
    private Collection $noteTotal;

    #[ORM\ManyToMany(targetEntity: TypeNote::class, inversedBy: 'posseders')]
    private Collection $typeNote;

    public function __construct()
    {
        $this->noteTotal = new ArrayCollection();
        $this->typeNote = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVal(): ?int
    {
        return $this->val;
    }

    public function setVal(int $val): self
    {
        $this->val = $val;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    /**
     * @return Collection<int, TypeNote>
     */
    public function getTypeNote(): Collection
    {
        return $this->typeNote;
    }

    public function addTypeNote(TypeNote $typeNote): self
    {
        if (!$this->typeNote->contains($typeNote)) {
            $this->typeNote->add($typeNote);
        }

        return $this;
    }

    public function removeTypeNote(TypeNote $typeNote): self
    {
        $this->typeNote->removeElement($typeNote);

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
