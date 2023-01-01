<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BancoPopController extends AbstractController
{
    #[Route('', name: 'app_banco_pop')]
    public function index(): Response
    {
        return $this->render('banco_pop/index.html.twig', [
            'controller_name' => 'BancoPopController',
        ]);
    }
}
