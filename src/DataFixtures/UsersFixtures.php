<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Users;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $faker = Faker\Factory::create();

        //$entityManager = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 10; $i++) {
            //echo $faker->name, "\n";
            $user = new Users();
            $user->setName($faker->name);
            $manager->persist($user);
        }
        
        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();

        $manager->flush();
    }
}
