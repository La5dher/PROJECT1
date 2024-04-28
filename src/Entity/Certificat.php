<?php

namespace App\Entity;

use App\Repository\CertificatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificatRepository::class)]
class Certificat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $domaine = null;

    #[ORM\ManyToOne(inversedBy: 'certificats')]
    private ?Etudiant $id_etudiant = null;

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

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): static
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->id_etudiant;
    }

    public function setIdEtudiant(?Etudiant $id_etudiant): static
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }
}
