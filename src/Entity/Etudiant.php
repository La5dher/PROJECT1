<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NCE = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Stage $id_stage = null;

    /**
     * @var Collection<int, Certificat>
     */
    #[ORM\OneToMany(targetEntity: Certificat::class, mappedBy: 'id_etudiant')]
    private Collection $certificats;

    /**
     * @var Collection<int, Experience>
     */
    #[ORM\OneToMany(targetEntity: Experience::class, mappedBy: 'id_etudiant')]
    private Collection $experiences;

    public function __construct()
    {
        $this->certificats = new ArrayCollection();
        $this->experiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIdStage(): ?Stage
    {
        return $this->id_stage;
    }

    public function setIdStage(?Stage $id_stage): static
    {
        $this->id_stage = $id_stage;

        return $this;
    }

    /**
     * @return Collection<int, Certificat>
     */
    public function getCertificats(): Collection
    {
        return $this->certificats;
    }

    public function addCertificat(Certificat $certificat): static
    {
        if (!$this->certificats->contains($certificat)) {
            $this->certificats->add($certificat);
            $certificat->setIdEtudiant($this);
        }

        return $this;
    }

    public function removeCertificat(Certificat $certificat): static
    {
        if ($this->certificats->removeElement($certificat)) {
            // set the owning side to null (unless already changed)
            if ($certificat->getIdEtudiant() === $this) {
                $certificat->setIdEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): static
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences->add($experience);
            $experience->setIdEtudiant($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): static
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getIdEtudiant() === $this) {
                $experience->setIdEtudiant(null);
            }
        }

        return $this;
    }
}
