<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise extends User
{


    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'id_entreprise')]
    private Collection $stages;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $categorie = null;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
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
            $stage->setIdEntreprise($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): static
    {
        if ($this->stages->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getIdEntreprise() === $this) {
                $stage->setIdEntreprise(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?array
    {
        return $this->categorie;
    }

    public function setCategorie(?array $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
