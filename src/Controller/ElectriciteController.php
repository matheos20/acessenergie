<?php
namespace App\Controller;
use App\Entity\Electricite;
use App\Entity\ElectriciteRecherche;
use App\Form\ElectriciteRechercheType;
use App\Form\ElectriciteRequestType;
use App\Repository\ElectriciteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ElectriciteController extends AbstractController{
    /**
     * @Route("/electricite", name="electricite_index", methods={"GET"})
     */
    public function index(ElectriciteRepository $electriciteRepository,PaginatorInterface $paginator, Request $request): Response
    {   $rechecher = new ElectriciteRecherche();
        $form = $this->createForm(ElectriciteRechercheType::class,$rechecher);
        $form->handleRequest($request);
        if (!empty($rechecher->getPDL1())){
            $electriciteQuerry = $electriciteRepository->findByElectricite($rechecher);
        }
        else{
            $electriciteQuerry = $electriciteRepository->findAll();
        }

        return $this->render('electricite/index.html.twig',[
            'electricites' => $paginator->paginate($electriciteQuerry, $request->query->getInt('page',1),20),
            'form' => $form->createView()
            ]);
    }
    /**
     * @Route("/{id}/electricite", name="electricite_show", methods={"GET"})
    */
    public function show(Electricite $electricite){
        return $this->render('electricite/show.html.twig', [
            'electricite' => $electricite,
        ]);
    }
    /**
     * @Route("/{id}/edit", name="electricite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Electricite $electricite): Response
    {
        $form = $this->createForm(ElectriciteRequestType::class, $electricite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('electricite_index');
        }

        return $this->render('electricite/edit.html.twig', [
            'electricite' => $electricite,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("electricite/delete/{id}", name="electricite_delete", methods={"POST"})
     */
    public function delete(Request $request, Electricite $electricite): Response
    {

        if ($this->isCsrfTokenValid('delete'.$electricite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($electricite);
            $entityManager->flush();
        }
        return $this->redirectToRoute('electricite_index');
    }
}