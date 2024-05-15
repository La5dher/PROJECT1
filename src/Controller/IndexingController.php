<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexingController extends AbstractController
{
    #[Route('/', name: 'app_indexing')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_login');
    }
}
