<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'stages')]
    private ?Entreprise $id_entreprise = null;

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\ManyToMany(targetEntity: Etudiant::class, inversedBy: 'stages')]
    private Collection $id_etudiant;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    public function __construct()
    {
        $this->id_etudiant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdEntreprise(): ?Entreprise
    {
        return $this->id_entreprise;
    }

    public function setIdEntreprise(?Entreprise $id_entreprise): static
    {
        $this->id_entreprise = $id_entreprise;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getIdEtudiant(): Collection
    {
        return $this->id_etudiant;
    }

    public function addIdEtudiant(Etudiant $idEtudiant): static
    {
        if (!$this->id_etudiant->contains($idEtudiant)) {
            $this->id_etudiant->add($idEtudiant);
        }

        return $this;
    }

    public function removeIdEtudiant(Etudiant $idEtudiant): static
    {
        $this->id_etudiant->removeElement($idEtudiant);

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }
}
