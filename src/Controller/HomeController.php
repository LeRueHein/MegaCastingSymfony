<?php

namespace App\Controller;

use App\Entity\OffreCasting;
use App\Repository\OffreCastingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $offer = $entityManager->getRepository(OffreCasting::class)->findAll();

        return $this->render('home/index.html.twig', [
            'offers' => $offer
        ]);

    }
    #[Route('/search/', name: 'app_search')]
    public function search( EntityManagerInterface $manager, Request $request): Response
    {
        $query = $request->get('query');
        if ($query == "")
        {
            return $this->redirectToRoute('app_home');


        }


        $offredecasting = $manager->getRepository(OffreCasting::class)->findSearch($query);

        //dd($offredecasting);
        return $this->render('home/search.html.twig', [
            'offers' => $offredecasting

        ]);

    }
}





