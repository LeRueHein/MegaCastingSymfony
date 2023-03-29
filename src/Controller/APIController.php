<?php

namespace App\Controller;

use App\Entity\OffreCasting;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class APIController extends AbstractController
{

    #[Route('/api/offer', name: 'app_offerapi', methods: 'GET')]
    #[OA\Get(
        summary: 'Retourne la liste des offres de casting',

    )]
    #[OA\Response(
        response: 200,
        description: 'Liste des offres de casting',
        content: new OA\JsonContent(
            type: 'array',
            items: new OA\Items(ref: new Model(type: OffreCasting::class)
            ))
    )]
    #[Route('/a/p/i', name: 'app_a_p_i')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'APIController',
        ]);
    }
    #[Route('/api/json', name: 'app_offerjson', methods: 'GET')]
    #[OA\Tag(name: 'offers')]
    public function offers(EntityManagerInterface $entityManager): JsonResponse{

        $offer = $entityManager->getRepository(OffreCasting::class)->findAll();



            return $this->json($offer, context: ['groups' => ['user']]);


   }
}
