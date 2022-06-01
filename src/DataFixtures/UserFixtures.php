<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername("Dieu-Puissant");
        $user->setPassword("$2y$13$6cAjqPHoESWwJdC/De9qjOSY8Cf5fED04X2HgFeP5.MuLgcK4eX9q");

        $manager->persist($user);


        $admin = new User();
        $admin->setUsername("admin");
        $admin->setPassword("$2y$13$6cAjqPHoESWwJdC/De9qjOSY8Cf5fED04X2HgFeP5.MuLgcK4eX9q");
        $admin->setRoles(["ROLE_ADMIN"]);

        $manager->persist($admin);
        $manager->flush();
    }
}
