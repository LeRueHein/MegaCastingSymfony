<?php

namespace App\Controller;

use App\Entity\OffreCasting;
use App\Form\FilterFromType;
use App\Repository\OffreCastingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Guesser\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;




class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(FilterFromType::class);

        $form = $form->handleRequest($request);
        //$form = $entityManager->getRepository(OffreCasting::class)->findBySponsor($form);


        if ($form->isSubmitted()) {

            $offer = $entityManager->getRepository(OffreCasting::class)->findByFilter($form);

        } else {
            $offer = $entityManager->getRepository(OffreCasting::class)->findAll();
        }

        $offer = $paginator->paginate(
            $offer, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            16 // Nombre de résultats par page
        );


        return $this->render('home/index.html.twig', [
            'offers' => $offer,
            'form' => $form
        ]);
    }
    #[Route('/search/', name: 'app_search')]
    public function search(EntityManagerInterface $manager, Request $request): Response
    {
        $query = $request->get('query');
        if ($query == "") {
            return $this->redirectToRoute('app_home');
        }

        $offredecasting = $manager->getRepository(OffreCasting::class)->findSearch($query);

        //dd($offredecasting);


        return $this->render('home/search.html.twig', [
            'offers' => $offredecasting,
        ]);
    }
}





