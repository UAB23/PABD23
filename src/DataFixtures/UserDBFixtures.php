<?php

namespace App\DataFixtures;

use App\Entity\UserDB;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserDBFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
		
		$admin=new UserDB();
        $admin->setEmail('admin@gmail.com');
        $admin->setPassword('adminDB');
        $rol = array("ROLE_ADMIN", "ROLE_USER");
        $admin->setRoles($rol);
        $manager->persist($admin);

        $manager->flush();
    }
}
