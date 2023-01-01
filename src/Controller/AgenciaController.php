<?php

namespace App\Controller;

use App\Entity\Agencia;
use App\Repository\AgenciaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenciaController extends AbstractController
{
    #[Route('/agencia', name: 'app_agencia')]
    public function index(AgenciaRepository $repository): Response
    {
        return $this->render('agencia/index.html.twig', [
            'agenciaAll' => $repository->findAll()
        ]);
    }

    #[Route('/agencia/{agenciaId}', name: 'app_agencia_show')]
    public function showOne(Agencia $agenciaId) : Response {
        // dd($agenciaId);

        return $this->render('agencia/show.html.twig', [
            'agencia' => $agenciaId
        ]);
    }
}
