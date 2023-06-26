<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StyleRepository::class)]
class Style
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $val_style = null;

    #[ORM\OneToOne(mappedBy: 'id_style', cascade: ['persist', 'remove'])]
    private ?Note $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValStyle(): ?int
    {
        return $this->val_style;
    }

    public function setValStyle(?int $val_style): self
    {
        $this->val_style = $val_style;

        return $this;
    }

    public function getNote(): ?Note
    {
        return $this->note;
    }

    public function setNote(?Note $note): self
    {
        // unset the owning side of the relation if necessary
        if ($note === null && $this->note !== null) {
            $this->note->setIdStyle(null);
        }

        // set the owning side of the relation if necessary
        if ($note !== null && $note->getIdStyle() !== $this) {
            $note->setIdStyle($this);
        }

        $this->note = $note;

        return $this;
    }
}
