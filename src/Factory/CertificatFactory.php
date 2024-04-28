<?php

namespace App\Factory;

use App\Entity\Certificat;
use App\Repository\CertificatRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Certificat>
 *
 * @method        Certificat|Proxy                     create(array|callable $attributes = [])
 * @method static Certificat|Proxy                     createOne(array $attributes = [])
 * @method static Certificat|Proxy                     find(object|array|mixed $criteria)
 * @method static Certificat|Proxy                     findOrCreate(array $attributes)
 * @method static Certificat|Proxy                     first(string $sortedField = 'id')
 * @method static Certificat|Proxy                     last(string $sortedField = 'id')
 * @method static Certificat|Proxy                     random(array $attributes = [])
 * @method static Certificat|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CertificatRepository|RepositoryProxy repository()
 * @method static Certificat[]|Proxy[]                 all()
 * @method static Certificat[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Certificat[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Certificat[]|Proxy[]                 findBy(array $attributes)
 * @method static Certificat[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Certificat[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CertificatFactory extends ModelFactory
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
            'domaine' => self::faker()->word(255),
            'titre' => self::faker()->word(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Certificat $certificat): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Certificat::class;
    }
}
