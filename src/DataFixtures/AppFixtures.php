<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

            for ($i = 0; $i < 20; $i++) {
                $user = new User();
                $user->setFirstName($faker->firstName);
                $user->setLastName($faker->lastName);
                $user->setUsername($faker->lastName);
                $user->setCreated($faker->dateTime($max = 'now', $timezone = null));
                $user->setPassword($faker->password);
                $manager->persist($user);
            }
            $manager->flush();
    }
}
