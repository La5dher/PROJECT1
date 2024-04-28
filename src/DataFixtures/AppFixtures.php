<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\CertificatFactory;
use App\Factory\EntrepriseFactory;
use App\Factory\EtudiantFactory;
use App\Factory\ExperienceFactory;
use App\Factory\StageFactory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CertificatFactory::createMany(3);
        EntrepriseFactory::createMany(5);
        EtudiantFactory::createMany(50);
        ExperienceFactory::createMany(1);
        StageFactory::createMany(40);

        
    }
}
