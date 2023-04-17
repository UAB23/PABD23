<?php

namespace App\DataFixtures;

use App\Entity\ImagesDB;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageDBFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $image1=new ImagesDB();
        $image1->setTitle('FEAA_1');
        $image1->setDescription('Foto din strada N. Bălcescu');
        $image1->setImagePath('BibicuDorin/Images/FEAA1.jpg');
        $image1->setDataImagine('06.06.2021');
        $manager->persist($image1);

        $image2=new ImagesDB();
        $image2->setTitle('FEAA_2');
        $image2->setDescription('Foto din curtea interioară');
        $image2->setImagePath('BibicuDorin/Images/FEAA2.jpg');
        $image2->setDataImagine('05.07.2022');
        $manager->persist($image2);

        $manager->flush();
    }
}
