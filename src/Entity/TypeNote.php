<?php

namespace App\Entity;

use App\Repository\TypeNoteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeNoteRepository::class)]
class TypeNote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $libelleTypeNote = null;

    #[ORM\ManyToMany(targetEntity: Posseder::class, mappedBy: 'typeNote')]
    private Collection $posseders;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeNote(): ?string
    {
        return $this->libelleTypeNote;
    }

    public function setLibelleTypeNote(?string $libelleTypeNote): self
    {
        $this->libelleTypeNote = $libelleTypeNote;

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
            $posseder->addTypeNote($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->removeElement($posseder)) {
            $posseder->removeTypeNote($this);
        }

        return $this;
    }

}
