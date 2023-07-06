<?php

namespace App\Entity;

use App\Repository\CavalierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CavalierRepository::class)]
class Cavalier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['json'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['json'])]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Groups(['json'])]
    private ?string $prenom = null;

    #[ORM\Column]
    #[Groups(['json'])]
    private ?int $license = null;

    #[ORM\Column(length: 50)]
    #[Groups(['json'])]
    private ?string $dossard = null;

    #[ORM\ManyToOne(inversedBy: 'cavaliers')]
    private ?NoteTotal $noteTotal = null;

    #[ORM\OneToMany(mappedBy: 'cavalier', targetEntity: Niveau::class)]
    private Collection $niveaux;

    #[ORM\ManyToMany(targetEntity: Competition::class, mappedBy: 'cavalier')]
    private Collection $competitions;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->competitions = new ArrayCollection();
    }

    #[SerializedName('id')]
    public function getId(): ?int
    {
        return $this->id;
    }

    #[SerializedName('nom')]
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    #[SerializedName('prenom')]
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    #[SerializedName('license')]
    public function getLicense(): ?int
    {
        return $this->license;
    }

    public function setLicense(int $license): self
    {
        $this->license = $license;

        return $this;
    }

    #[SerializedName('dossard')]
    public function getDossard(): ?string
    {
        return $this->dossard;
    }

    public function setDossard(string $dossard): self
    {
        $this->dossard = $dossard;

        return $this;
    }

    public function getNoteTotal(): ?NoteTotal
    {
        return $this->noteTotal;
    }

    public function setNoteTotal(?NoteTotal $noteTotal): self
    {
        $this->noteTotal = $noteTotal;

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

    public function __toString()
    {
        return $this->nom;
    }
}
