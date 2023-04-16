<?php

namespace App\Entity;

use App\Repository\ObstacleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObstacleRepository::class)]
class Obstacle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'idObstacle', targetEntity: NoteTotal::class)]
    private ?NoteTotal $noteTotal = null;

    #[ORM\ManyToMany(targetEntity: Parametrer::class, mappedBy: 'obstacle')]
    private Collection $parametrers;

<<<<<<< HEAD
    #[ORM\ManyToMany(targetEntity: Epreuve::class, mappedBy: 'obstacle')]
    private Collection $epreuves;
=======
    #[ORM\OneToMany(targetEntity: Penalite::class, mappedBy: 'idObstacle')]
    private Collection $idPenalite;
>>>>>>> f3c5660 (push before rebase)

    public function __construct()
    {
        $this->parametrers = new ArrayCollection();
<<<<<<< HEAD
        $this->epreuves = new ArrayCollection();
=======
        $this->idPenalite = new ArrayCollection();
>>>>>>> f3c5660 (push before rebase)
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNoteTotal(): ?NoteTotal
    {
        return $this->noteTotal;
    }

    public function setNoteTotal(?NoteTotal $noteTotal): self
    {
        $this->noteTotal = $noteTotal;

        return $this;
    }

    /**
     * @return Collection<int, Parametrer>
     */
    public function getParametrers(): Collection
    {
        return $this->parametrers;
    }

    public function addParametrer(Parametrer $parametrer): self
    {
        if (!$this->parametrers->contains($parametrer)) {
            $this->parametrers->add($parametrer);
            $parametrer->addObstacle($this);
        }

        return $this;
    }

    public function removeParametrer(Parametrer $parametrer): self
    {
        if ($this->parametrers->removeElement($parametrer)) {
            $parametrer->removeObstacle($this);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return Collection<int, Epreuve>
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreufe(Epreuve $epreufe): self
    {
        if (!$this->epreuves->contains($epreufe)) {
            $this->epreuves->add($epreufe);
            $epreufe->addObstacle($this);
=======
     * @return Collection<int, Penalite>
     */
    public function getIdPenalite(): Collection
    {
        return $this->idPenalite;
    }

    public function addIdPenalite(Penalite $idPenalite): self
    {
        if (!$this->idPenalite->contains($idPenalite)) {
            $this->idPenalite->add($idPenalite);
            $idPenalite->addIdObstacle($this);
>>>>>>> f3c5660 (push before rebase)
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeEpreufe(Epreuve $epreufe): self
    {
        if ($this->epreuves->removeElement($epreufe)) {
            $epreufe->removeObstacle($this);
=======
    public function removeIdPenalite(Penalite $idPenalite): self
    {
        if ($this->idPenalite->removeElement($idPenalite)) {
            $idPenalite->removeIdObstacle($this);
>>>>>>> f3c5660 (push before rebase)
        }

        return $this;
    }
<<<<<<< HEAD
    
    public function __toString()
    {
        return $this->nom;
    }
=======
>>>>>>> f3c5660 (push before rebase)
}
