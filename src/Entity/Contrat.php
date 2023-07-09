<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['json'])]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['json'])]
    private ?int $val_contrat = null;

    #[ORM\OneToOne(mappedBy: 'contrat', cascade: ['persist', 'remove'])]
    private ?Note $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValContrat(): ?int
    {
        return $this->val_contrat;
    }

    public function setValContrat(?int $val_contrat): self
    {
        $this->val_contrat = $val_contrat;

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
            $this->note->setIdContrat(null);
        }

        // set the owning side of the relation if necessary
        if ($note !== null && $note->getIdContrat() !== $this) {
            $note->setIdContrat($this);
        }

        $this->note = $note;

        return $this;
    }
}
