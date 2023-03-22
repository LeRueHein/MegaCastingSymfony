<?php

namespace App\Controller;

use App\Entity\OffreCasting;
use App\Form\OffreCastingType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'app_offer')]
    public function index($id, EntityManagerInterface $entityManager): Response
    {
        $offer = $entityManager->getRepository(OffreCasting::class)->find($id);
        return $this->render('offer/new.html.twig', [
            'offers' => $offer


        ]);
    }
    #[Route('/offer/{id}', name: 'app_offer')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // creates a task object and initializes some data for this example
        $offre = new OffreCasting();


        $form = $this->createForm(OffreCastingType::class, $offre );

        $form = $form->handleRequest($request);

        if($form->isSubmitted()){

            $offre = $form->GetData();
            $entityManager->persist($offre);
            $entityManager->flush();


            return $this->redirectToRoute('app_home', ['id' => $offre->getId()]);
        }
        return $this->render('offer/index.html.twig', [
            'form' => $form,
        ]);

}}
