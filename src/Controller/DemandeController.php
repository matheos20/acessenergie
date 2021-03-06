<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Electricite;
use App\Entity\ElectricitePlus20;
use App\Entity\Gaz;
use App\Entity\GazPlus20;
use App\Form\AuthorizationRequestType;
use App\Form\ClientType;
use App\Form\GazType;
use App\Form\Request\AuthorizationRequest;
use App\Repository\ClientRepository;
use App\Repository\ElectricitePlus20Repository;
use App\Repository\ElectriciteRepository;
use App\Repository\GazPlus20Repository;
use App\Repository\GazRepository;
use Doctrine\Persistence\ObjectManager;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use \Mailjet\Resources;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class DemandeController extends AbstractController
{

    /** envoyer demende au client
     * @Route("/demad/{id}", name="Ajout_demande"):
     *
     * @param Client          $client
     * @param Request         $request
     * @param MailerInterface $mailer
     *
     * @return Response
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function demande(Client $client, Request $request, MailerInterface $mailer): Response
    {
        $em = $this->getDoctrine()->getManager();
        $authorizationRequest = new AuthorizationRequest();
        $form = $this->createForm(AuthorizationRequestType::class, $authorizationRequest);
        $form->handleRequest($request);
        $isHasSelectedOne = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $token = uniqid();
            $hasGaz = false;
            $hasElec = false;
            if ($authorizationRequest->getIsNaturalGaz() && $authorizationRequest->getIsTwentyGaz()) {
                $authorizationRequest->getGazNatural()->setClient($client)->setTokenToConfirmAuthorization($token);
                $em->persist($authorizationRequest->getGazNatural());
                $isHasSelectedOne = true;
                $hasGaz = true;
            }
            if ($authorizationRequest->getElectricite() && $authorizationRequest->getIsTwentyElec()) {
                $authorizationRequest->getElectricite()->setClient($client)->setTokenToConfirmAuthorization($token);
                $em->persist($authorizationRequest->getElectricite());
                $isHasSelectedOne = true;
                $hasElec = true;
            }
            if ($authorizationRequest->getIsElectricite() && $authorizationRequest->getIsMoreThanTwentyElec()) {
                $elecPlus20 = new ElectricitePlus20();
                $elecPlus20->setClient($client);
                $elecPlus20->setTokenToConfirmAuthorization($token);
                $elecPlus20->setElectriciteplus20('Pour le(s) PDL dont la liste est annex??e ?? la pr??sente autorisation ');
                $em->persist($elecPlus20);
                $isHasSelectedOne = true;
                $hasElec = true;
            }
            if ($authorizationRequest->getIsNaturalGaz() && $authorizationRequest->getIsMoreThanTwentyGaz()) {
                $gazPlus20 = new GazPlus20();
                $gazPlus20->setClient($client);
                $gazPlus20->setTokenToConfirmAuthorization($token);
                $gazPlus20->setGazplus20('Pour le(s) PCE dont la liste est annex??e ?? la pr??sente autorisation ');
                $em->persist($gazPlus20);
                $isHasSelectedOne = true;
                $hasGaz = true;
            }
            if ($isHasSelectedOne === true) {
                $em->flush();
                //send mail
                $email = (new Email())
                    ->to($client->getMail())
                    ->subject('Demande d\'autorisation de collecte de donn??es ' . ($hasGaz ? 'de gaz' : '') .($hasGaz && $hasElec ? ' / ' : ''). ($hasElec ? 'd\'??lectricit??' : ''))
                    ->html($this->renderView(
                        'demande/clientMessage.html.twig',
                        ['name' => $client->getNameOfSignatory(), 'id' => $client->getId(), 'token' => $token])
                    );
                $mailer->send($email);
                $this->addFlash('succes', 'Votre demande a ??t?? envoy?? avec succ??s.!');
                return $this->redirectToRoute('client_index');
            }
            $isHasSelectedOne = false;
        }

        return $this->render('demande/envoyer.html.twig', [
            'form' => $form->createView(),
            'client' => $client,
            'isHasSelectedOne' => $isHasSelectedOne
        ]);
    }

    /** Reponse client click j'autorise
     * @Route("/email/response/{client}/{token}", name="Email_demandee",methods={"GET","POST"})
     *
     * @param Client                      $client
     * @param string                      $token
     * @param GazRepository               $gazRepository
     * @param ElectricitePlus20Repository $electricitePlus20Repository
     * @param ElectriciteRepository       $electriciteRepository
     * @param GazPlus20Repository         $gazPlus20
     * @param MailerInterface             $mailer
     *
     * @return Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function RenvoyerMail(
        Client $client,
        string $token,
        GazRepository $gazRepository,
        ElectricitePlus20Repository $electricitePlus20Repository,
        ElectriciteRepository $electriciteRepository,
        GazPlus20Repository $gazPlus20,
        MailerInterface $mailer
    )
    {
        $em = $this->getDoctrine()->getManager();
        $gazClient = $gazRepository->findLastByClient($client->getId(), $token);
        $elecClient = $electriciteRepository->findLastByClient($client->getId(), $token);
        $gaz20Client = $gazPlus20->findLastByClient($client->getId(), $token);
        $elec20Client = $electricitePlus20Repository->findLastByClient($client->getId(), $token);
        $isHasMailSended = false;
        if ($gazClient instanceof Gaz) {
            $attachement = $this->generatePdfAttachement('AttachementPdf/attacheGazPdf.html.twig', $gazClient, $client, 'ACDgaz'.$client->getSocialReason().'.pdf');
            $this->sendMailDuplicata('ACD gaz','demande/gazMessage.html.twig', $gazClient, $client, $mailer, $attachement);
            $gazClient->setIsAlreadyAuthorized(1);
            $gazClient->setHorodatage(new \DateTime());
            $em->persist($gazClient);
            $isHasMailSended = true;
        }
        if ($elecClient instanceof Electricite) {
            $attachement = $this->generatePdfAttachement('AttachementPdf/attacheElectricitePdf.html.twig', $elecClient, $client, 'ACDelectricite'.$client->getSocialReason().'.pdf');
            $this->sendMailDuplicata('ACD ??lectricit??','demande/electriciteMessage.html.twig', $elecClient, $client, $mailer, $attachement);
            $elecClient->setIsAlreadyAuthorized(1);
            $elecClient->setHorodatage(new \DateTime());
            $em->persist($elecClient);
            $isHasMailSended = true;
        }
        if ($gaz20Client instanceof GazPlus20) {
            $attachement = $this->generatePdfAttachement('AttachementPdf/attacheGazPlus20Pdf.html.twig', $gaz20Client, $client, 'ACDgaz'.$client->getSocialReason().'.pdf');
            $this->sendMailDuplicata('ACD gaz','demande/gazplus20Message.html.twig', $gaz20Client, $client, $mailer, $attachement);
            $gaz20Client->setIsAlreadyAuthorized(1);
            $gaz20Client->setHorodatage(new \DateTime());
            $em->persist($gaz20Client);
            $isHasMailSended = true;
        }
        if ($elec20Client instanceof ElectricitePlus20) {
            $attachement = $this->generatePdfAttachement('AttachementPdf/attacheElectricitePlus20Pdf.html.twig', $elec20Client, $client, 'ACDelectricite'.$client->getSocialReason().'.pdf');
            $this->sendMailDuplicata('ACD ??lectricit??','demande/electriciteplus20Message.html.twig', $elec20Client, $client, $mailer, $attachement);
            $elec20Client->setIsAlreadyAuthorized(1);
            $elec20Client->setHorodatage(new \DateTime());
            $em->persist($elec20Client);
            $isHasMailSended = true;
        }
        $em->flush();

        return $this->render('demande/message.html.twig', ['isHasMailSend' => $isHasMailSended]);

    }

    private function sendMailDuplicata(string $subject,string $template, $value, Client $client, MailerInterface $mailer, string $attachement)
    {
        $email = (new Email())
            ->to($client->getMail())
            ->subject($subject)
            ->attachFromPath($attachement)
            ->html($this->renderView($template, [
                'value' => $value,
                'client' => $client
            ]));
        $mailer->send($email);
    }

    private function generatePdfAttachement(string $template, $value, Client $client, string $name)
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView($template, ['client' => $client, 'value' => $value]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Store PDF Binary Data
        $output = $dompdf->output();

        $pdfFilepath = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $name;

        // Write file to the desired path
        file_put_contents($pdfFilepath, $output);

        return $pdfFilepath;
    }
}
