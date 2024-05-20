<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EntrepriseType;
use App\Form\EtudiantType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    /**
     * @Route("/user",name="user")
     */
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        $type = null;

        if ($user instanceof \App\Entity\Etudiant) {
            $type = 'etudiant';
        } elseif ($user instanceof \App\Entity\Entreprise) {
            $type = 'entreprise';
        }
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
            'user' => $user,
            'type' => $type,
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(User $user, Request $request, EntityManagerInterface $manager): Response
{
    $type = null;
    $form = null;

    if ($user instanceof \App\Entity\Etudiant) {
        $form = $this->createForm(EtudiantType::class, $user);
        $type = 'etudiant';
    } elseif ($user instanceof \App\Entity\Entreprise) {
        $form = $this->createForm(EntrepriseType::class, $user);
        $type = 'entreprise';
    }

    if ($form === null) {
        // Fallback to a default form if user type is not recognized
        $form = $this->createForm(UserType::class, $user);
    }

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $manager->persist($user);
        $manager->flush();

        $this->addFlash(
            'success',
            'Les informations de votre compte ont bien été modifiées.'
        );

        return $this->redirectToRoute('app_user_index');
    }

    return $this->render('user/edit.html.twig', [
        'form' => $form->createView(),
        'user' => $user,
        'type' => $type,
    ]);
}



    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
