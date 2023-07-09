<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: NiveauRepository::class)]
class Niveau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['json'])]
    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'niveaux')]
    private ?Cavalier $cavalier = null;

    #[ORM\ManyToMany(targetEntity: Parametrer::class, mappedBy: 'niveau')]
    private Collection $parametrers;

    #[ORM\OneToOne(mappedBy: 'niveau', cascade: ['persist', 'remove'])]
    private ?Note $note = null;

    public function __construct()
    {
        $this->parametrers = new ArrayCollection();
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

    public function getCavalier(): ?Cavalier
    {
        return $this->cavalier;
    }

    public function setCavalier(?Cavalier $cavalier): self
    {
        $this->cavalier = $cavalier;

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
            $parametrer->addNiveau($this);
        }

        return $this;
    }

    public function removeParametrer(Parametrer $parametrer): self
    {
        if ($this->parametrers->removeElement($parametrer)) {
            $parametrer->removeNiveau($this);
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
            $this->note->setIdNiveau(null);
        }

        // set the owning side of the relation if necessary
        if ($note !== null && $note->getIdNiveau() !== $this) {
            $note->setIdNiveau($this);
        }

        $this->note = $note;

        return $this;
    }
}
