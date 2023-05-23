<?php

namespace App\DataFixtures;
use App\Entity\BMAptitudine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BMAptitudineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $aptitudine1 = new BMAptitudine();
$aptitudine1->setNume('Team player');
$aptitudine2 = new BMAptitudine();
$aptitudine2->setNume('Sociabila');
$aptitudine3 = new BMAptitudine();
$aptitudine3->setNume('Deschisa la ceea ce este nou');
$aptitudine4 = new BMAptitudine();
$aptitudine4->setNume('Descurcareata');
        $manager->persist($aptitudine1);
        $manager->persist($aptitudine2);
        $manager->persist($aptitudine3);
        $manager->persist($aptitudine4);

        $manager->flush();
        $this->addReference("Aptitudine_1",$aptitudine1);
        $this->addReference("Aptitudine_2",$aptitudine2);
        $this->addReference("Aptitudine_3",$aptitudine3);
        $this->addReference("Aptitudine_4",$aptitudine4);
    }
}
