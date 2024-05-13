<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\EtudiantFactory;
use App\Factory\StageFactory;
use App\Factory\EntrepriseFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EtudiantFactory::createMany(100);
        StageFactory::createMany(50);
        EntrepriseFactory::createMany(3);
    }
}
