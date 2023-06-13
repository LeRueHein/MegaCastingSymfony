<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditProfilUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/profil/edit/{id}', name: 'app_profil_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage, INT $id): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        $form = $this->createForm(EditProfilUserType::class, $user);

        $form = $form->handleRequest($request);

        if ($form->isSubmitted()) {

            //enregistrer en BDD
            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_profil_edit');
        }
        return $this->render('profil/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
