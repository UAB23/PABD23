<?php

namespace App\DataFixtures;
use App\Entity\BMUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BMUserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $user = new BMUser();
$user->setNume('Bianca Man');
$user->setOcupatie('Inginer chimist');
$user->setResedinta('Com.Mihai Viteazu');
$user->setAnulnasterii(1998);
$user->addAptitudini($this->getReference("Aptitudine_1"));
$user->addAptitudini($this->getReference("Aptitudine_2"));
$user->addAptitudini($this->getReference("Aptitudine_3"));
$user->addAptitudini($this->getReference("Aptitudine_4"));
        $manager->persist($user);

        $manager->flush();
    }
}
