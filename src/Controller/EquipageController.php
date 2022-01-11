<?php

namespace App\Controller;

use App\Entity\Equipage;
use App\Form\EquipageType;
use App\Repository\EquipageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equipage")
 */
class EquipageController extends AbstractController
{
    /**
     * @Route("/", name="equipage_index", methods={"GET"})
     */
    public function index(EquipageRepository $equipageRepository): Response
    {
        return $this->render('equipage/index.html.twig', [
            'equipages' => $equipageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="equipage_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipage = new Equipage();
        $form = $this->createForm(EquipageType::class, $equipage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($equipage);
            $entityManager->flush();

            return $this->redirectToRoute('equipage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipage/new.html.twig', [
            'equipage' => $equipage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="equipage_show", methods={"GET"})
     */
    public function show(Equipage $equipage): Response
    {
        return $this->render('equipage/show.html.twig', [
            'equipage' => $equipage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="equipage_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Equipage $equipage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipageType::class, $equipage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('equipage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipage/edit.html.twig', [
            'equipage' => $equipage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="equipage_delete", methods={"POST"})
     */
    public function delete(Request $request, Equipage $equipage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($equipage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipage_index', [], Response::HTTP_SEE_OTHER);
    }
}
