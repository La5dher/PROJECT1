<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use App\Model\SearchData;
use App\Repository\StageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/stage')]
class StageController extends AbstractController
{
    #[Route('/', name: 'app_stage_index', methods: ['GET'])]
    public function index(StageRepository $stageRepository): Response
    {
        return $this->render('stage/index.html.twig', [
            'stages' => $stageRepository->affichePage(),
        ]);
    }

    #[Route('/new', name: 'app_stage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stage);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stage/new.html.twig', [
            'stage' => $stage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stage_show', methods: ['GET'])]
    public function show(Stage $stage): Response
    {
        return $this->render('stage/show.html.twig', [
            'stage' => $stage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stage $stage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stage/edit.html.twig', [
            'stage' => $stage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stage_delete', methods: ['POST'])]
    public function delete(Request $request, Stage $stage, EntityManagerInterface $entityManager): Response
    {
        
        if ($this->isCsrfTokenValid('delete'.$stage->getId(), $request->request->get('_token'))) {
                $entityManager->remove($stage);
                $entityManager->flush();
        $this->addFlash('success', 'Stage deleted successfully');
        } else {
            $this->addFlash('error', 'Invalid CSRF token');
        }

        return $this->redirectToRoute('app_user_index'); 
    }

    #[Route('/find/{name}', name: 'app_stage_search', methods: ['GET'])]
    public function findName(StageRepository $stageRepository,Request $request): Response
    {
        #explode("?",explode("/",$request)[3])[0])
        return $this->render('stage/index.html.twig', [
            'stages' => $stageRepository->findByTitre(explode("?",explode("/",$request)[3])[0]),
        ]);
    }



    public function findBySearch(SearchData $searchData): PaginationInterface{
        $data = $this->createQueryBuilder('p')
            ->where('p.state LIKE :state')
            ->setParameter('state', '%STATE_PUBLISHED%' )
            ->addOrderBy('p.createdAt', 'DESC');

        if (!empty($searchData->q)) {
        // Search on post's title
        $data = $data
            ->andWhere('p.title LIKE :q')
            ->setParameter('q', "%{$searchData->q}%");

        }
        $data = $data
            ->getQuery()
            ->getResult();
}
}
