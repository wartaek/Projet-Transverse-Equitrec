<?php

namespace App\Entity;

use App\Repository\CavalierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CavalierRepository::class)]
class Cavalier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $license = null;

    #[ORM\Column(length: 50)]
    private ?string $dossard = null;

    #[ORM\OneToMany(mappedBy: 'cavalier', targetEntity: Niveau::class)]
    private Collection $niveaux;

    #[ORM\ManyToMany(targetEntity: Competition::class, mappedBy: 'cavalier')]
    private Collection $competitions;

    #[ORM\ManyToMany(targetEntity: Penalite::class, mappedBy: 'idCavalier')]
    private Collection $idPenalite;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->competitions = new ArrayCollection();
        $this->idPenalite = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLicense(): ?int
    {
        return $this->license;
    }

    public function setLicense(int $license): self
    {
        $this->license = $license;

        return $this;
    }

    public function getDossard(): ?string
    {
        return $this->dossard;
    }

    public function setDossard(string $dossard): self
    {
        $this->dossard = $dossard;

        return $this;
    }

    /**
     * @return Collection<int, Niveau>
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux->add($niveau);
            $niveau->setCavalier($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            // set the owning side to null (unless already changed)
            if ($niveau->getCavalier() === $this) {
                $niveau->setCavalier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Competition>
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions->add($competition);
            $competition->addCavalier($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->removeElement($competition)) {
            $competition->removeCavalier($this);
        }

        return $this;
    }

<<<<<<< HEAD
    public function __toString()
    {
        return $this->nom;
=======
    /**
     * @return Collection<int, Penalite>
     */
    public function getIdPenalite(): Collection
    {
        return $this->idPenalite;
    }

    public function addIdPenalite(Penalite $idPenalite): self
    {
        if (!$this->idPenalite->contains($idPenalite)) {
            $this->idPenalite->add($idPenalite);
            $idPenalite->addIdCavalier($this);
        }

        return $this;
    }

    public function removeIdPenalite(Penalite $idPenalite): self
    {
        if ($this->idPenalite->removeElement($idPenalite)) {
            $idPenalite->removeIdCavalier($this);
        }

        return $this;
>>>>>>> f3c5660 (push before rebase)
    }
}
