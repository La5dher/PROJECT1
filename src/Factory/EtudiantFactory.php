<?php

namespace App\Factory;

use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Etudiant>
 *
 * @method        Etudiant|Proxy                     create(array|callable $attributes = [])
 * @method static Etudiant|Proxy                     createOne(array $attributes = [])
 * @method static Etudiant|Proxy                     find(object|array|mixed $criteria)
 * @method static Etudiant|Proxy                     findOrCreate(array $attributes)
 * @method static Etudiant|Proxy                     first(string $sortedField = 'id')
 * @method static Etudiant|Proxy                     last(string $sortedField = 'id')
 * @method static Etudiant|Proxy                     random(array $attributes = [])
 * @method static Etudiant|Proxy                     randomOrCreate(array $attributes = [])
 * @method static EtudiantRepository|RepositoryProxy repository()
 * @method static Etudiant[]|Proxy[]                 all()
 * @method static Etudiant[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Etudiant[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Etudiant[]|Proxy[]                 findBy(array $attributes)
 * @method static Etudiant[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Etudiant[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class EtudiantFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $faker = self::faker();
        return [
            'NCE' => $faker->randomNumber(), // Generates a random number
            'institut' => $faker->text(255), // Generates text up to 255 characters
            'login' => $faker->userName(), // Generates a realistic username
            'niveau' => $faker->text(255), // Generates text up to 255 characters
            'nom' => $faker->lastName(), // Generates a realistic last name
            'password' => $faker->password(), // Generates a secure password
            'prenom' => $faker->firstName(), // Generates a realistic first name
            #'roles' => $faker->randomElements(['ROLE_USER', 'ROLE_ADMIN'], 1), // Randomly selects 1 role
            'roles' => [],
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Etudiant $etudiant): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Etudiant::class;
    }
}
