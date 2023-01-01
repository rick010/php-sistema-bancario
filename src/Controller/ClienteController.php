<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\CommentType;
use App\Repository\ClienteRepository;
use App\Form\ClienteType;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClienteController extends AbstractController
{
    #[Route('/cliente', name: 'app_cliente')]
    public function index(): Response
    {
        return $this->render('cliente/index.html.twig', [
            'controller_name' => 'ClienteController',
        ]);
    }

    #[Route('/cliente/add', name: 'app_cliente_add', priority: 2)]
    public function add(Request $request, ClienteRepository $repository) : Response { 
        
        $form = $this->createForm(ClienteType::class, new Cliente());

        //o formulário foi submetido? 
        $form->handleRequest($request);
        //se sim, tratar a submissão
        if ($form->isSubmitted() && $form->isValid()) {
            $cliente = $form->getData();
            $cliente->setCreated(new \DateTime());
            $cliente->setTipo($form->gettype);
            $repository->save($cliente, true);
            $this->addFlash('success', 'Cliente foi salvo!');
            return $this->redirectToRoute('app_cliente');
        }

        //caso contrário, renderizar o formulário para adicionar posts
        return $this->renderForm(
            'cliente/add.html.twig',
            [ 'form' => $form ]
        );
    }
}
