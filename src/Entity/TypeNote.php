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

    #[ORM\ManyToMany(targetEntity: Posseder::class, mappedBy: 'typeNote')]
    private Collection $posseders;

    #[ORM\OneToMany(targetEntity: NoteTotal::class, mappedBy: 'idTypeNote')]
    private Collection $idNote;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
        $this->idNote = new ArrayCollection();
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
     * @return Collection<int, Posseder>
     */
    public function getPosseders(): Collection
    {
        return $this->posseders;
    }

    public function addPosseder(Posseder $posseder): self
    {
        if (!$this->posseders->contains($posseder)) {
            $this->posseders->add($posseder);
            $posseder->addTypeNote($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->removeElement($posseder)) {
            $posseder->removeTypeNote($this);
        }

        return $this;
    }

<<<<<<< HEAD
    public function __toString()
    {
        return $this->libelleTypeNote;
    }
=======
    /**
     * @return Collection<int, NoteTotal>
     */
    public function getIdNote(): Collection
    {
        return $this->idNote;
    }

    public function addIdNote(NoteTotal $idNote): self
    {
        if (!$this->idNote->contains($idNote)) {
            $this->idNote->add($idNote);
        }

        return $this;
    }

    public function removeIdNote(NoteTotal $idNote): self
    {
        $this->idNote->removeElement($idNote);

        return $this;
    }

>>>>>>> f3c5660 (push before rebase)
}
