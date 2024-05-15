<?php

namespace App\Factory;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Entreprise>
 *
 * @method        Entreprise|Proxy                     create(array|callable $attributes = [])
 * @method static Entreprise|Proxy                     createOne(array $attributes = [])
 * @method static Entreprise|Proxy                     find(object|array|mixed $criteria)
 * @method static Entreprise|Proxy                     findOrCreate(array $attributes)
 * @method static Entreprise|Proxy                     first(string $sortedField = 'id')
 * @method static Entreprise|Proxy                     last(string $sortedField = 'id')
 * @method static Entreprise|Proxy                     random(array $attributes = [])
 * @method static Entreprise|Proxy                     randomOrCreate(array $attributes = [])
 * @method static EntrepriseRepository|RepositoryProxy repository()
 * @method static Entreprise[]|Proxy[]                 all()
 * @method static Entreprise[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Entreprise[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Entreprise[]|Proxy[]                 findBy(array $attributes)
 * @method static Entreprise[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Entreprise[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class EntrepriseFactory extends ModelFactory
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
        return [
            'categorie' => self::faker()->word(),
            'login' => self::faker()->unique()->word(),
            'nom' => self::faker()->word(),
            'prenom'=>self::faker()->word(),
            'description'=>self::faker()->text(),
            'nom_entreprise'=>self::faker()->word(),
            'password' => self::faker()->word(),
            'roles' => [],
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Entreprise $entreprise): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Entreprise::class;
    }
}
