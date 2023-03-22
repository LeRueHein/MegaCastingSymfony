<?php

namespace App\DataFixtures;

use App\Entity\Civilite;
use App\Entity\Client;
use App\Entity\DomaineMetier;
use App\Entity\Metier;
use App\Entity\OffreCasting;
use App\Entity\TypeContrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {




        $datenow = new \DateTime();

        $client = new Client();
        $client->setNom("paule");
        $client->setVille("paris");
        $client->setTelephone(2222);
        $client->setEmail("martin@gmail.com");
        $client->setLogin("root");
        $client->setPassword("root");


        $typeContrat = new TypeContrat();
        $typeContrat->setLibel("test");



        $offer = new OffreCasting();
        $offer->setLibel("cherche musicien");
        $offer->setReference("20h minimum");
        $offer->setParutionDateTime($datenow);
        $offer->setOffreDateStart($datenow);
        $offer->setOffreDateEnd($datenow);
        $offer->setLocalisation("Paris");
        $offer->setClient($client);
        $offer->setTypecontrat($typeContrat);

        $domaineMetier = new DomaineMetier();
        $domaineMetier->setLibel("hoho");
        $domaineMetier->setDescription("fzfdzf");

        $civilite = new Civilite();
        $civilite->setLibelShort("yolo");
        $civilite->setLibelLong("yala");

        $metier = new Metier();
        $metier->setLibel("medecin");
        $metier->setDescription("je suis jesus");
        $metier->setDomaineMetier($domaineMetier);






        $manager->persist($metier);
        $manager->persist($domaineMetier);
        $manager->persist($offer);
        $manager->persist($typeContrat);
        $manager->persist($client);
        $manager->persist($civilite);

        $manager->flush();

    }
}
