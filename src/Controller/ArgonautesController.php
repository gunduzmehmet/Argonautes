<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EquipageRepository;

class ArgonautesController extends AbstractController
{
    /**
     * @Route("/argonautes", name="argonautes")
     */
    public function index(EquipageRepository $equipageRepository): Response
    {
        return $this->render('argonautes/index.html.twig', [
            'equipages' => $equipageRepository->findAll(),
        ]);
    }
}
