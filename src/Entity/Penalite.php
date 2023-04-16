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

    #[ORM\Column(length: 50)]
    private ?string $libellePenalite = null;

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
<<<<<<< HEAD

<<<<<<< HEAD
    public function __toString()
    {
        return $this->libellePenalite;
=======
    public function getVal(): ?int
    {
        return $this->val;
    }

    public function setVal(?int $val): self
    {
        $this->val = $val;

        return $this;
    }

    /**
     * @return Collection<int, obstacle>
     */
    public function getIdObstacle(): Collection
    {
        return $this->idObstacle;
    }

    public function addIdObstacle(obstacle $idObstacle): self
    {
        if (!$this->idObstacle->contains($idObstacle)) {
            $this->idObstacle->add($idObstacle);
        }

        return $this;
    }

    public function removeIdObstacle(obstacle $idObstacle): self
    {
        $this->idObstacle->removeElement($idObstacle);

        return $this;
    }

    /**
     * @return Collection<int, cavalier>
     */
    public function getIdCavalier(): Collection
    {
        return $this->idCavalier;
    }

    public function addIdCavalier(cavalier $idCavalier): self
    {
        if (!$this->idCavalier->contains($idCavalier)) {
            $this->idCavalier->add($idCavalier);
        }

        return $this;
    }

    public function removeIdCavalier(cavalier $idCavalier): self
    {
        $this->idCavalier->removeElement($idCavalier);

        return $this;
>>>>>>> f3c5660 (push before rebase)
    }
=======
>>>>>>> 4ce9a68 (Revert "push before rebase")
}
