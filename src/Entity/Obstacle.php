<?php

namespace App\Entity;

use App\Repository\ObstacleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ObstacleRepository::class)]
class Obstacle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['json'])]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Parametrer::class, mappedBy: 'obstacle')]
    private Collection $parametrers;

    #[ORM\ManyToMany(targetEntity: Epreuve::class, mappedBy: 'obstacle')]
    private Collection $epreuves;

    #[ORM\OneToOne(mappedBy: 'obstacle', cascade: ['persist', 'remove'])]
    private ?Note $note = null;

    public function __construct()
    {
        $this->parametrers = new ArrayCollection();
        $this->epreuves = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeEpreufe(Epreuve $epreufe): self
    {
        if ($this->epreuves->removeElement($epreufe)) {
            $epreufe->removeObstacle($this);
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->nom;
    }

    public function getNote(): ?Note
    {
        return $this->note;
    }

    public function setNote(?Note $note): self
    {
        // unset the owning side of the relation if necessary
        if ($note === null && $this->note !== null) {
            $this->note->setIdObstacle(null);
        }

        // set the owning side of the relation if necessary
        if ($note !== null && $note->getIdObstacle() !== $this) {
            $note->setIdObstacle($this);
        }

        $this->note = $note;

        return $this;
    }
}
