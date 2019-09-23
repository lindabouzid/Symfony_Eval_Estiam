<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Answers;
use App\Entity\Questions;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AnswersFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $faker = Faker\Factory::create();
        $questions = $manager->getRepository(Questions::class)->findAll();

        //$entityManager = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 10; $i++) {
            //echo $faker->name, "\n";
            $answer = new Answers();
            $answer->setContent($faker->text);
            $answer->setStatus($faker->boolean);
            $answer->setQuestion($faker->randomElement($questions));
            $manager->persist($answer);
        }
        
    //     // actually executes the queries (i.e. the INSERT query)
    //     //$entityManager->flush();

        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            QuestionsFixtures::class,
        );
    }

}
