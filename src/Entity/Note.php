<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Obstacle $obstacle = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Cavalier $cavalier = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Niveau $niveau = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Style $style = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Contrat $contrat = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Allure $allure = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Penalite $penalite = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObstacle(): ?Obstacle
    {
        return $this->obstacle;
    }

    public function setObstacle(?Obstacle $obstacle): self
    {
        $this->obstacle = $obstacle;

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

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function setContrat(?Contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getAllure(): ?Allure
    {
        return $this->allure;
    }

    public function setAllure(?Allure $allure): self
    {
        $this->allure = $allure;

        return $this;
    }

    public function getPenalite(): ?Penalite
    {
        return $this->penalite;
    }

    public function setPenalite(?Penalite $penalite): self
    {
        $this->penalite = $penalite;

        return $this;
    }
}
