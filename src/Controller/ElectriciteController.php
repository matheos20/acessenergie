<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Electricite;
use App\Entity\ElectriciteRecherche;
use App\Form\ElectriciteRechercheType;
use App\Form\ElectriciteRequestType;
use App\Repository\ElectriciteRepository;
use Knp\Component\Pager\PaginatorInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ElectriciteController extends AbstractController
{
    /**
     * @Route("/electricite", name="electricite_index", methods={"GET"})
     */
    public function index(ElectriciteRepository $electriciteRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $rechecher = new ElectriciteRecherche();
        $form = $this->createForm(ElectriciteRechercheType::class, $rechecher);
        $form->handleRequest($request);
        if (!empty($rechecher->getPDL1())) {
            $electriciteQuerry = $electriciteRepository->findByElectricite($rechecher);
        } else {
            $electriciteQuerry = $electriciteRepository->findAll();
        }

        return $this->render('electricite/index.html.twig', [
            'electricites' => $paginator->paginate($electriciteQuerry, $request->query->getInt('page', 1), 20),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/electricite", name="electricite_show", methods={"GET"})
     */
    public function show(Electricite $electricite)
    {
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

        if ($this->isCsrfTokenValid('delete' . $electricite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($electricite);
            $entityManager->flush();
        }
        return $this->redirectToRoute('electricite_index');
    }

    /**
     * @Route("/consommation", name="client_consommation",  methods={"GET"})
     */
    public function consommation(): Response
    {
        return $this->render('electricite/consommation.html.twig');
    }

    /**
     * @param Request $request
     * @param ElectriciteRepository $electriciteRepository
     * @return JsonResponse
     * @Route("/consommation/search", name="search_consommation",  methods={"POST"})
     */
    public function consommationSearch(Request $request, ElectriciteRepository $electriciteRepository, LoggerInterface $logger)
    {
        try {
            $terms = $request->request->get('terms');
            $elecs = $electriciteRepository->searchByTerms(is_array($terms) ? $terms : [])->getResult();
            return new JsonResponse($this->formatDataConsommationByTerms($terms, $elecs));
        } catch (\Exception $ex) {
            $logger->error('error on search consommation', ['message' => $ex->getMessage(), 'trace' => $ex->getTraceAsString()]);
            return new JsonResponse(['message' => 'an error internal server'], 500);
        }
    }


    private function formatDataConsommationByTerms(array $terms, $elecs): array
    {
        $res = [];
        /**
         * @var Electricite $elec
         */
        foreach ($elecs as $elec) {
            $methods = [];
            foreach ($terms as $term) {
                for ($i = 1; $i <= 20; $i++) {
                    $method = 'getPDL'.$i;
                    if (strpos($elec->{$method}(), $term) !== false && !in_array($method, $methods)){
                        $methods[] = $method;
                        $res[] = [
                            'dateNow' => $elec->getHorodatage() ? $elec->getHorodatage()->format('d/m/Y H:i:s')  : '',
                            'nameOfSignatory' => $elec->getClient()->getNameOfSignatory(),
                            'mail' => $elec->getClient()->getMail(),
                            'address' => $elec->getClient()->getAddress(),
                            'pdl1' => $elec->{$method}(),
                            'linkToDownloadExcel' => $this->generateUrl('electricite_excel', ['id' => $elec->getId()])
                        ];
                    }
                }
            }
        }
        return $res;
    }
    /**
     * @Route("/electriciteExcel}", name="electricite_excel")
     * @param Request $request
     * @param ElectriciteRepository $electriciteRepository
     * @param LoggerInterface $logger
     * @return BinaryFileResponse|JsonResponse
     */
    public function exportEcel(Request $request, ElectriciteRepository $electriciteRepository, LoggerInterface $logger)
    {
        try {
            $terms = json_decode($request->query->get('terms'), true);
            $elecs = $electriciteRepository->searchByTerms(is_array($terms) ? $terms : [])->getResult();

            $spreadshee = new Spreadsheet();
            $sheet = $spreadshee->getActiveSheet();
            $sheet->setCellValue('A1', 'HORODATAGE');
            $sheet->setCellValue('B1', 'IDENTITÉ');
            $sheet->setCellValue('C1', 'ADRESSE MAIL');
            $sheet->setCellValue('D1', 'ADRESSE PHYSIQUE');
            $sheet->setCellValue('E1', 'NUMÉRO DE PRM');
            $sheet->setCellValue('F1', 'AUTORISATION');
            $sheet->setCellValue('G1', 'DONNÉES TECHNIQUES');
            $sheet->setCellValue('H1', 'DONNÉES CONTRACTUELLES');
            $sheet->setCellValue('I1', 'DONNÉES DE MESURE');
            $i = 2;
            $datas = $this->formatDataConsommationByTerms($terms, $elecs);
            foreach ($datas as $item) {
                $sheet->setCellValue('A' . $i, $item['dateNow']);
                $sheet->setCellValue('B' . $i, $item['nameOfSignatory']);
                $sheet->setCellValue('C' . $i, $item['mail']);
                $sheet->setCellValue('D' . $i, ['address']);
                $sheet->setCellValue('E' . $i, $item['pdl1']);
                $sheet->setCellValue('F' . $i, 'Oui');
                $sheet->setCellValue('G' . $i, 'Oui');
                $sheet->setCellValue('H' . $i, 'Oui');
                $sheet->setCellValue('I' . $i, 'Oui');
                $i++;
            }
            $writer = new Xlsx($spreadshee);
            $name = uniqid('consommation_') . '.xlsx';
            $filename = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $name;
            $writer->save($filename);

            $response = new BinaryFileResponse($filename);
            $response->headers->set('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
            $response->setContentDisposition(
                ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                $name
            );

            return $response;
        } catch (\Exception $ex) {
            $logger->error('error on download excel consommation', ['message' => $ex->getMessage(), 'trace' => $ex->getTraceAsString()]);
            return new JsonResponse(['message' => 'an error internal server'], 500);
        }
    }
}
