<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpreuveRepository::class)]
class Epreuve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\ManyToMany(targetEntity: Competition::class, inversedBy: 'epreuves')]
    private Collection $competition;

    #[ORM\ManyToMany(targetEntity: Categorie::class, mappedBy: 'epreuve')]
    private Collection $categories;

    #[ORM\ManyToMany(targetEntity: Parametrer::class, mappedBy: 'epreuve')]
    private Collection $parametrers;

    #[ORM\ManyToMany(targetEntity: Obstacle::class, inversedBy: 'epreuves')]
    private Collection $obstacle;

    public function __construct()
    {
        $this->competition = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->parametrers = new ArrayCollection();
        $this->obstacle = new ArrayCollection();
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

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection<int, competition>
     */
    public function getCompetition(): Collection
    {
        return $this->competition;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competition->contains($competition)) {
            $this->competition->add($competition);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        $this->competition->removeElement($competition);

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addEpreuve($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeEpreuve($this);
        }

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
            $parametrer->addEpreuve($this);
        }

        return $this;
    }

    public function removeParametrer(Parametrer $parametrer): self
    {
        if ($this->parametrers->removeElement($parametrer)) {
            $parametrer->removeEpreuve($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Obstacle>
     */
    public function getObstacle(): Collection
    {
        return $this->obstacle;
    }

    public function addObstacle(Obstacle $obstacle): self
    {
        if (!$this->obstacle->contains($obstacle)) {
            $this->obstacle->add($obstacle);
        }

        return $this;
    }

    public function removeObstacle(Obstacle $obstacle): self
    {
        $this->obstacle->removeElement($obstacle);

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }
}
