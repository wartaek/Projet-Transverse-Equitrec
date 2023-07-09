<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
    #[Groups(['json'])]
    private ?Style $style = null;

    #[Groups(['json'])]
    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Contrat $contrat = null;

    #[Groups(['json'])]
    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Allure $allure = null;

    #[Groups(['json'])]
    #[ORM\OneToOne(inversedBy: 'note', cascade: ['persist', 'remove'])]
    private ?Penalite $penalite = null;

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
