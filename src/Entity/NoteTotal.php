<?php

namespace App\Entity;

use App\Repository\NoteTotalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteTotalRepository::class)]
class NoteTotal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $note = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $observation = null;

    #[ORM\OneToMany(mappedBy: 'noteTotal', targetEntity: user::class)]
    private Collection $user;

    #[ORM\ManyToMany(targetEntity: Penalite::class, mappedBy: 'noteTotal')]
    private Collection $penalites;

    #[ORM\OneToMany(mappedBy: 'noteTotal', targetEntity: Obstacle::class)]
    private Collection $obstacles;

    #[ORM\OneToMany(mappedBy: 'noteTotal', targetEntity: Cavalier::class)]
    private Collection $cavaliers;

    #[ORM\ManyToMany(targetEntity: Posseder::class, mappedBy: 'noteTotal')]
    private Collection $posseders;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->penalites = new ArrayCollection();
        $this->obstacles = new ArrayCollection();
        $this->cavaliers = new ArrayCollection();
        $this->posseders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setNoteTotal($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getNoteTotal() === $this) {
                $user->setNoteTotal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Penalite>
     */
    public function getPenalites(): Collection
    {
        return $this->penalites;
    }

    public function addPenalite(Penalite $penalite): self
    {
        if (!$this->penalites->contains($penalite)) {
            $this->penalites->add($penalite);
            $penalite->addNoteTotal($this);
        }

        return $this;
    }

    public function removePenalite(Penalite $penalite): self
    {
        if ($this->penalites->removeElement($penalite)) {
            $penalite->removeNoteTotal($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Obstacle>
     */
    public function getObstacles(): Collection
    {
        return $this->obstacles;
    }

    public function addObstacle(Obstacle $obstacle): self
    {
        if (!$this->obstacles->contains($obstacle)) {
            $this->obstacles->add($obstacle);
            $obstacle->setNoteTotal($this);
        }

        return $this;
    }

    public function removeObstacle(Obstacle $obstacle): self
    {
        if ($this->obstacles->removeElement($obstacle)) {
            // set the owning side to null (unless already changed)
            if ($obstacle->getNoteTotal() === $this) {
                $obstacle->setNoteTotal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cavalier>
     */
    public function getCavaliers(): Collection
    {
        return $this->cavaliers;
    }

    public function addCavalier(Cavalier $cavalier): self
    {
        if (!$this->cavaliers->contains($cavalier)) {
            $this->cavaliers->add($cavalier);
            $cavalier->setNoteTotal($this);
        }

        return $this;
    }

    public function removeCavalier(Cavalier $cavalier): self
    {
        if ($this->cavaliers->removeElement($cavalier)) {
            // set the owning side to null (unless already changed)
            if ($cavalier->getNoteTotal() === $this) {
                $cavalier->setNoteTotal(null);
            }
        }

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
            $posseder->addNoteTotal($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->removeElement($posseder)) {
            $posseder->removeNoteTotal($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->note;
    }
}
