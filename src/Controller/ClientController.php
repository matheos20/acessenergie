<?php

namespace App\Controller;

use App\Entity\Client;

use App\Form\ClientRechercheType;
use App\Form\ClientType;
use App\Form\Request\ClientRecherche;
use App\Repository\ClientRepository;
use App\Repository\ElectricitePlus20Repository;
use App\Repository\ElectriciteRepository;
use App\Repository\GazPlus20Repository;
use App\Repository\GazRepository;
use DateTime;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;


class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index")
     */
    public function index(ClientRepository $clientRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $recherche = new ClientRecherche();
        $form = $this->createForm(ClientRechercheType::class, $recherche);
        $form->handleRequest($request);
        $searchQuery = $clientRepository->findBySocialResion($recherche->getSocialReason() ? $recherche->getSocialReason() : "");


        return $this->render('client/index.html.twig', [
            'clients' => $paginator->paginate($searchQuery, $request->query->getInt('page', 1), 20),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/clientpdf/{id}", name="client_pdf")
     */
    public function renderpdf(
        Client $id,
        GazRepository $gazRepository,
        ElectriciteRepository $electriciteRepository,
        ElectricitePlus20Repository $electricPlus20,
        GazPlus20Repository $gazplus20
    )
    {
        $gaz = $gazRepository->findBy(['client' => $id->getId(), 'isAlreadyAuthorized' => true]);
        $electric = $electriciteRepository->findBy(['client' => $id->getId(), 'isAlreadyAuthorized' => true]);
        $electricitePlus = $electricPlus20->findBy(['client' => $id->getId(), 'isAlreadyAuthorized' => true]);
        $gazPlus = $gazplus20->findBy(['client' => $id->getId(), 'isAlreadyAuthorized' => true]);

        if (empty($gaz) && empty($electric) && empty($electricitePlus) && empty($gazPlus)) {
            $this->addFlash('danger', 'le client n\'a pas validé son consentement');
            return $this->redirectToRoute('client_index');
        }
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('FilePdf/pdf.html.twig', [
            'client' => $id,
            'gazs' => $gaz,
            'electrics' => $electric,
            'electreicite' => $electricitePlus,
            'gazPluss' => $gazPlus
            // dd($gazs),

        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        @$dompdf->render();
        $isHasGaz = !empty($gaz) || !empty($gazPlus);
        $isHasElec = !empty($electric) || !empty($electricitePlus);
        // Output the generated PDF to Browser (force download)
        $filename = 'ACD' . ($isHasGaz ? 'gaz' : '') . ($isHasGaz && $isHasElec ? '-' : '') . ($isHasElec ? 'électricité' : '') . ' ' . $id->getSocialReason() . '.pdf';
        $dompdf->stream($filename, ["Attachment" => true]);
        dd($dompdf);
    }

    /**
     * @Route("/new", name="client_new")
     */
    public function new(Request $request): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("client/{id}", name="client_show")
     */
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("client/{id}/edit", name="client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("client/delete/{id}", name="client_delete")
     */
    public function delete(Request $request, Client $client, ElectriciteRepository $electriciteRepository, GazRepository $gazRepository, ElectricitePlus20Repository $electricPlus20, GazPlus20Repository $gazPlus20): Response
    {
        $electirqs = $electriciteRepository->findBy(['client' => $client->getId()]);
        $gazs = $gazRepository->findBy(['client' => $client->getId()]);
        $electirqplus = $electricPlus20->findBy(['client' => $client->getId()]);
        $gazplus = $gazPlus20->findBy(['client' => $client->getId()]);


        $entityManager = $this->getDoctrine()->getManager();

        foreach ($gazs as $gaz) {
            $entityManager->remove($gaz);
        }

        foreach ($electirqs as $electirq) {
            $entityManager->remove($electirq);
        }

        foreach ($electirqplus as $electirqplu) {
            $entityManager->remove($electirqplu);
        }

        foreach ($gazplus as $gazplu) {
            $entityManager->remove($gazplu);
        }
        // $entityManager->flush();


        //if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
        //  $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($client);
        $entityManager->flush();
        //}

        return $this->redirectToRoute('client_index');
    }

}
