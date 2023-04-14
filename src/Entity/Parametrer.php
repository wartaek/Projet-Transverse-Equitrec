<?php

namespace App\Entity;

use App\Repository\ParametrerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametrerRepository::class)]
class Parametrer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $hauteur = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $largeur = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $tempsMax = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $pente = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $front = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $informations = null;

    #[ORM\ManyToMany(targetEntity: Epreuve::class, inversedBy: 'parametrers')]
    private Collection $epreuve;

    #[ORM\ManyToMany(targetEntity: Niveau::class, inversedBy: 'parametrers')]
    private Collection $niveau;

    #[ORM\ManyToMany(targetEntity: Obstacle::class, inversedBy: 'parametrers')]
    private Collection $obstacle;

    public function __construct()
    {
        $this->epreuve = new ArrayCollection();
        $this->niveau = new ArrayCollection();
        $this->obstacle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHauteur(): ?string
    {
        return $this->hauteur;
    }

    public function setHauteur(string $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getLargeur(): ?string
    {
        return $this->largeur;
    }

    public function setLargeur(?string $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getTempsMax(): ?string
    {
        return $this->tempsMax;
    }

    public function setTempsMax(?string $tempsMax): self
    {
        $this->tempsMax = $tempsMax;

        return $this;
    }

    public function getPente(): ?string
    {
        return $this->pente;
    }

    public function setPente(?string $pente): self
    {
        $this->pente = $pente;

        return $this;
    }

    public function getFront(): ?string
    {
        return $this->front;
    }

    public function setFront(?string $front): self
    {
        $this->front = $front;

        return $this;
    }

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(?string $informations): self
    {
        $this->informations = $informations;

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

    /**
     * @return Collection<int, niveau>
     */
    public function getNiveau(): Collection
    {
        return $this->niveau;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveau->contains($niveau)) {
            $this->niveau->add($niveau);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        $this->niveau->removeElement($niveau);

        return $this;
    }

    /**
     * @return Collection<int, obstacle>
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
}
