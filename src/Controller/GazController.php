<?php

namespace App\Controller;

use App\Entity\Gaz;
use App\Entity\GazRecherche;
use App\Form\GazRechercheType;
use App\Form\GazType;
use App\Repository\GazRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class GazController extends AbstractController
{
    /**
     * @Route("/gaz", name="gaz_index", methods={"GET"})
     */
    public function index(GazRepository $gazRepository, PaginatorInterface $paginator, Request $request): Response
    {   $recherche = new GazRecherche();
        $form = $this->createForm(GazRechercheType::class,$recherche);
        $form->handleRequest($request);
        if (!empty($recherche->getPCE1())){
            $gazQuerry = $gazRepository->findByGaz($recherche);
        }
        else{
            $gazQuerry = $gazRepository->findAll();
        }

        return $this->render('gaz/index.html.twig', [
            'gazs' => $paginator->paginate($gazQuerry, $request->query->getInt('page',1),20),
            'form' => $form->createView()
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
     * @Route("gaz/{id}/gaz", name="gaz_show", methods={"GET"})
     */
    public function show(Gaz $gaz): Response
    {
        return $this->render('gaz/show.html.twig', [
            'gaz' => $gaz,
        ]);
    }

    /**
     * @Route("gaz/{id}/edit", name="gaz_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gaz $gaz): Response
    {
        $form = $this->createForm(GazType::class, $gaz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $this->getDoctrine()->getManager()->flush();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gaz);
            $entityManager->flush();

            return $this->redirectToRoute('gaz_index');
        }

        return $this->render('gaz/edit.html.twig', [
            'gaz' => $gaz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("gaz/delete/{id}", name="gaz_delete")
     * @IsGranted("ROLE_ADMIN")
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
