<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Obstacle $obstacle = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Cavalier $cavalier = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Niveau $niveau = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Style $style = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Contrat $contrat = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Allure $allure = null;

    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Penalite $penalite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObstacle(): ?Obstacle
    {
        return $this->obstacle;
    }

    public function setIdObstacle(?Obstacle $obstacle): self
    {
        $this->obstacle = $obstacle;

        return $this;
    }

    public function getIdCavalier(): ?Cavalier
    {
        return $this->cavalier;
    }

    public function setIdCavalier(?Cavalier $cavalier): self
    {
        $this->cavalier = $cavalier;

        return $this;
    }

    public function getIdNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setIdNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdStyle(): ?Style
    {
        return $this->style;
    }

    public function setIdStyle(?Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getIdContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function setIdContrat(?Contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getIdAllure(): ?Allure
    {
        return $this->allure;
    }

    public function setIdAllure(?Allure $allure): self
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
