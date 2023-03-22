<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\OffreCasting;
use App\Entity\TypeContrat;
use Cassandra\Date;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {


        //variable datetime

        //$typeContrat = new TypeContrat();
        //$typeContrat->setLibel("test");

        //$datenow = new \DateTime();

        /// creation des clients \\\

        //$client = new Client();

        //$client->setNom("paule");
        //$client->setVille("paris");
        //$client->setTelephone(2222);
        //$client->setEmail("martin@gmail.com");
        //$client->setLogin("root");
        //$client->setPassword("root");

        /// creation des offres \\\

      // $offer = new OffreCasting();

       // $offer->setLibel("cherche cuisinier");
        //$offer->setReference("35h minimum");
        //$offer->setParutionDateTime($datenow);
        //$offer->setOffreDateStart($datenow);
        //$offer->setOffreDateEnd($datenow);
        //$offer->setLocalisation("Paris");
        //$offer->setClient($client);
        //$offer->setTypecontrat($typeContrat);


        /// creation des types de contrats \\\

        //$contract = new TypeContrat();
        //$contract->setLibel("cherche pote");

        //$entityManager->persist($contract);
        //$entityManager->persist($offer);
        //$entityManager->persist($client);
        //$entityManager->persist($typeContrat);
        //$entityManager->flush();



        //dd($offer);
        $offer = $entityManager->getRepository(OffreCasting::class)->findAll();

        return $this->render('home/index.html.twig', [
            'offers' => $offer
        ]);


    }
}






