<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Epreuve::class, inversedBy: 'categories')]
    private Collection $epreuve;

    public function __construct()
    {
        $this->epreuve = new ArrayCollection();
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
     * @return Collection<int, epreuve>
     */
    public function getEpreuve(): Collection
    {
        return $this->epreuve;
    }

    public function addEpreuve(Epreuve $epreuve): self
    {
        if (!$this->epreuve->contains($epreuve)) {
            $this->epreuve->add($epreuve);
        }

        return $this;
    }

    public function removeEpreuve(Epreuve $epreuve): self
    {
        $this->epreuve->removeElement($epreuve);

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
