<?php

namespace App\Controller;

use App\Entity\Gaz;
use App\Form\GazType;
use App\Repository\GazRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gaz")
 */
class GazController extends AbstractController
{
    /**
     * @Route("/", name="gaz_index", methods={"GET"})
     */
    public function index(GazRepository $gazRepository): Response
    {
        return $this->render('gaz/index.html.twig', [
            'gazs' => $gazRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gaz_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gaz = new Gaz();
        $form = $this->createForm(GazType::class, $gaz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gaz);
            $entityManager->flush();

            return $this->redirectToRoute('gaz_index');
        }

        return $this->render('gaz/new.html.twig', [
            'gaz' => $gaz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gaz_show", methods={"GET"})
     */
    public function show(Gaz $gaz): Response
    {
        return $this->render('gaz/show.html.twig', [
            'gaz' => $gaz,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gaz_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gaz $gaz): Response
    {
        $form = $this->createForm(GazType::class, $gaz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gaz_index');
        }

        return $this->render('gaz/edit.html.twig', [
            'gaz' => $gaz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gaz_delete", methods={"POST"})
     */
    public function delete(Request $request, Gaz $gaz): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gaz->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gaz);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gaz_index');
    }
}
