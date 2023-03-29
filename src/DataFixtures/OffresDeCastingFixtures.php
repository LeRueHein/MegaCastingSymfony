<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\OffreCasting;
use App\Entity\TypeContrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;


class OffresDeCastingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void{

        $faker = Faker\Factory::create('fr_FR');

        $client = new Client();
        $client->setNom("paule");
        $client->setVille("paris");
        $client->setTelephone(2222);
        $client->setEmail("martin@gmail.com");
        $client->setLogin("root");
        $client->setPassword("root");

        $manager->persist($client);


        $typeContrat = new TypeContrat();
        $typeContrat->setLibel("test");

        $manager->persist($typeContrat);


        for($i = 1; $i <= 500; $i++) {
            $offer = new OffreCasting();
            $offer->setLibel($faker->sentence())
                ->setLocalisation($faker->word())
                ->setReference($faker->paragraph(2))
                ->setParutionDateTime(new \DateTime('-' . rand(1,100) . 'days'))
                ->setOffreDateStart(new \DateTime('-' . rand(1,100) . 'days'))
                ->setOffreDateEnd(new \DateTime('-' . rand(1,100) . 'days'))
                ->setClient($client)
                ->setTypecontrat($typeContrat);


            $manager->persist($offer);

        }
        $manager->flush();
    }



}
