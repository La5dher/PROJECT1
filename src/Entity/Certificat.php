<?php

namespace App\Entity;

use App\Repository\CertificatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificatRepository::class)]
class Certificat extends Realisation
{

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $domaine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau = null;

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(?string $domaine): static
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }
}
