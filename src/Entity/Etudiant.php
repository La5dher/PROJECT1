<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant extends User
{

    #[ORM\Column]
    private ?int $NCE = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 254)]
    private ?string $institut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_naissance = null;

  

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\ManyToMany(targetEntity: Stage::class, mappedBy: 'id_etudiant')]
    private Collection $stages;

    /**
     * @var Collection<int, Realisation>
     */
    #[ORM\OneToMany(targetEntity: Realisation::class, mappedBy: 'id_etudiant')]
    private Collection $realisations;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
        $this->realisations = new ArrayCollection();
    }

    public function getNCE(): ?int
    {
        return $this->NCE;
    }

    public function setNCE(int $NCE): static
    {
        $this->NCE = $NCE;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getInstitut(): ?string
    {
        return $this->institut;
    }

    public function setInstitut(string $institut): static
    {
        $this->institut = $institut;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }


    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): static
    {
        if (!$this->stages->contains($stage)) {
            $this->stages->add($stage);
            $stage->addIdEtudiant($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): static
    {
        if ($this->stages->removeElement($stage)) {
            $stage->removeIdEtudiant($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Realisation>
     */
    public function getRealisations(): Collection
    {
        return $this->realisations;
    }

    public function addRealisation(Realisation $realisation): static
    {
        if (!$this->realisations->contains($realisation)) {
            $this->realisations->add($realisation);
            $realisation->setIdEtudiant($this);
        }

        return $this;
    }

    public function removeRealisation(Realisation $realisation): static
    {
        if ($this->realisations->removeElement($realisation)) {
            // set the owning side to null (unless already changed)
            if ($realisation->getIdEtudiant() === $this) {
                $realisation->setIdEtudiant(null);
            }
        }

        return $this;
    }
}
