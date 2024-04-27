<?php

namespace App\Factory;

use App\Entity\Experience;
use App\Repository\ExperienceRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Experience>
 *
 * @method        Experience|Proxy                     create(array|callable $attributes = [])
 * @method static Experience|Proxy                     createOne(array $attributes = [])
 * @method static Experience|Proxy                     find(object|array|mixed $criteria)
 * @method static Experience|Proxy                     findOrCreate(array $attributes)
 * @method static Experience|Proxy                     first(string $sortedField = 'id')
 * @method static Experience|Proxy                     last(string $sortedField = 'id')
 * @method static Experience|Proxy                     random(array $attributes = [])
 * @method static Experience|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ExperienceRepository|RepositoryProxy repository()
 * @method static Experience[]|Proxy[]                 all()
 * @method static Experience[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Experience[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Experience[]|Proxy[]                 findBy(array $attributes)
 * @method static Experience[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Experience[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ExperienceFactory extends ModelFactory
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
            'description' => self::faker()->text(255),
            'titre' => self::faker()->word(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Experience $experience): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Experience::class;
    }
}
