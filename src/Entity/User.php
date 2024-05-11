<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_LOGIN', fields: ['login'])]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['etudiant' => Etudiant::class, 'entreprise' => Entreprise::class])]
#[UniqueEntity(fields: ['login'], message: 'There is already an account with this login')]
abstract class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $login = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $reseaux_sociaux = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $telephone = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $fixe = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $adresse = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->login;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReseauxSociaux(): ?array
    {
        return $this->reseaux_sociaux;
    }

    public function setReseauxSociaux(?array $reseaux_sociaux): static
    {
        $this->reseaux_sociaux = $reseaux_sociaux;

        return $this;
    }

    public function getTelephone(): ?array
    {
        return $this->telephone;
    }

    public function setTelephone(?array $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFixe(): ?array
    {
        return $this->fixe;
    }

    public function setFixe(?array $fixe): static
    {
        $this->fixe = $fixe;

        return $this;
    }

    public function getAdresse(): ?array
    {
        return $this->adresse;
    }

    public function setAdresse(?array $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?array
    {
        return $this->email;
    }

    public function setEmail(?array $email): static
    {
        $this->email = $email;

        return $this;
    }
}
