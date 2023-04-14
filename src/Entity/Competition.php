<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 6)]
    private ?string $cp = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse = null;

    #[ORM\ManyToMany(targetEntity: Cavalier::class, inversedBy: 'competitions')]
    private Collection $cavalier;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: User::class)]
    private Collection $user;

    #[ORM\ManyToMany(targetEntity: Epreuve::class, mappedBy: 'competition')]
    private Collection $epreuves;

    public function __construct()
    {
        $this->cavalier = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->epreuves = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, cavalier>
     */
    public function getCavalier(): Collection
    {
        return $this->cavalier;
    }

    public function addCavalier(Cavalier $cavalier): self
    {
        if (!$this->cavalier->contains($cavalier)) {
            $this->cavalier->add($cavalier);
        }

        return $this;
    }

    public function removeCavalier(Cavalier $cavalier): self
    {
        $this->cavalier->removeElement($cavalier);

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setCompetition($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCompetition() === $this) {
                $user->setCompetition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Epreuve>
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreuve(Epreuve $epreuve): self
    {
        if (!$this->epreuves->contains($epreuve)) {
            $this->epreuves->add($epreuve);
            $epreuve->addCompetition($this);
        }

        return $this;
    }

    public function removeEpreuve(Epreuve $epreuve): self
    {
        if ($this->epreuves->removeElement($epreuve)) {
            $epreuve->removeCompetition($this);
        }

        return $this;
    }
}
