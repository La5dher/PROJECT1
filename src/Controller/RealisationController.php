<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Form\Realisation1Type;
use App\Repository\RealisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/realisation')]
class RealisationController extends AbstractController
{
    #[Route('/', name: 'app_realisation_index', methods: ['GET'])]
    public function index(RealisationRepository $realisationRepository): Response
    {
        $realisations = $realisationRepository->findAll();
        $type= null;

        if ($realisations && count($realisations) > 0) {
            $realisation = $realisations[0]; 
            if ($realisation instanceof \App\Entity\Certificat) {
                $type = 'certificat';
            } elseif ($realisation instanceof \App\Entity\Experience) {
                $type = 'experience';
            }
        }

        return $this->render('realisation/index.html.twig', [
            'realisations' => $realisations,
            'type' => $type,
        ]);
    }

    #[Route('/new', name: 'app_realisation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $realisation = new Realisation();
        $form = $this->createForm(Realisation1Type::class, $realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($realisation);
            $entityManager->flush();

            return $this->redirectToRoute('app_realisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('realisation/new.html.twig', [
            'realisation' => $realisation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_realisation_show', methods: ['GET'])]
    public function show(Realisation $realisation): Response
    {
        return $this->render('realisation/show.html.twig', [
            'realisation' => $realisation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_realisation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Realisation $realisation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Realisation1Type::class, $realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_realisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('realisation/edit.html.twig', [
            'realisation' => $realisation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_realisation_delete', methods: ['POST'])]
    public function delete(Request $request, Realisation $realisation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realisation->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($realisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_realisation_index', [], Response::HTTP_SEE_OTHER);
    }
}
