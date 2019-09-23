<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Questions;
use App\Entity\Users;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class QuestionsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $faker = Faker\Factory::create();
        $users = $manager->getRepository(Users::class)->findAll();

        //$entityManager = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 10; $i++) {
            //echo $faker->name, "\n";
            $question = new Questions();
            $question->setContent($faker->text);
            $question->setTitle($faker->text);
            $question->setUser($faker->randomElement($users));
            $manager->persist($question);
        }
        
        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();

        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            UsersFixtures::class,
        );
    }

}
