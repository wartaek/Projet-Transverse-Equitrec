<?php

namespace App\Entity;

use App\Repository\AllureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllureRepository::class)]
class Allure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $val_allure = null;

    #[ORM\OneToOne(mappedBy: 'allure', cascade: ['persist', 'remove'])]
    private ?Note $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValAllure(): ?int
    {
        return $this->val_allure;
    }

    public function setValAllure(?int $val_allure): self
    {
        $this->val_allure = $val_allure;

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
            $this->note->setIdAllure(null);
        }

        // set the owning side of the relation if necessary
        if ($note !== null && $note->getIdAllure() !== $this) {
            $note->setIdAllure($this);
        }

        $this->note = $note;

        return $this;
    }
}
