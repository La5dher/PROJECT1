<?php

namespace App\Factory;

use App\Entity\Stage;
use App\Repository\StageRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Stage>
 *
 * @method        Stage|Proxy                     create(array|callable $attributes = [])
 * @method static Stage|Proxy                     createOne(array $attributes = [])
 * @method static Stage|Proxy                     find(object|array|mixed $criteria)
 * @method static Stage|Proxy                     findOrCreate(array $attributes)
 * @method static Stage|Proxy                     first(string $sortedField = 'id')
 * @method static Stage|Proxy                     last(string $sortedField = 'id')
 * @method static Stage|Proxy                     random(array $attributes = [])
 * @method static Stage|Proxy                     randomOrCreate(array $attributes = [])
 * @method static StageRepository|RepositoryProxy repository()
 * @method static Stage[]|Proxy[]                 all()
 * @method static Stage[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Stage[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Stage[]|Proxy[]                 findBy(array $attributes)
 * @method static Stage[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Stage[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class StageFactory extends ModelFactory
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
            'date_debut' => self::faker()->dateTime(),
            'date_fin' => self::faker()->dateTime(),
            'titre' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Stage $stage): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Stage::class;
    }
}
