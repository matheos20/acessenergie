<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Electricite;
use App\Entity\Gaz;
use App\Entity\GazPlus20;
use App\Form\ClientType;
use App\Form\GazType;
use App\Repository\ClientRepository;
use App\Repository\ElectriciteRepository;
use App\Repository\GazRepository;
use Doctrine\Persistence\ObjectManager;
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
     */
    public function demande(Client $client, ClientRepository $clientRepository): Response
    {
        return $this->render('demande/envoyer.html.twig', [
            'clients'=> $clientRepository->findAll(),
            'client' => $client,
        ]);
    }



    /** Envoyer email au client
     * @Route("/email", name="Email_demande",methods={"GET","POST"})
     */
    public function email(Request $request, ClientRepository $clientRepository,MailerInterface $mailer){
        $gaz = null;
        $electric = null;
        
        $idClient = $request->request->get('id_client');
        $client = $clientRepository->find($idClient);
        $gaz20 = $request->request->get('gaz2');
        $electric20 = $request->request->get('electric2');
        $gazs = $request->request->get('gaz');
        $electrique = $request->request->get('electrique');
        if ($gazs !== null) {
            $PCE1 = $request->request->get('PCE1');
            $PCE2 = $request->request->get('PCE2');
            $PCE3 = $request->request->get('PCE3');
            $PCE4 = $request->request->get('PCE4');
            $PCE5 = $request->request->get('PCE5');
            $PCE6 = $request->request->get('PCE6');
            $PCE7 = $request->request->get('PCE7');
            $PCE8 = $request->request->get('PCE8');
            $PCE9 = $request->request->get('PCE9');
            $PCE10 = $request->request->get('PCE10');
            $PCE11 = $request->request->get('PCE11');
            $PCE12 = $request->request->get('PCE12');
            $PCE13 = $request->request->get('PCE13');
            $PCE14 = $request->request->get('PCE14');
            $PCE15 = $request->request->get('PCE15');
            $PCE16 = $request->request->get('PCE16');
            $PCE17 = $request->request->get('PCE17');
            $PCE18 = $request->request->get('PCE18');
            $PCE19 = $request->request->get('PCE19');
            $PCE20 = $request->request->get('PCE20');
            $gaz = new Gaz();
            $gaz->setClient($client);
            $gaz->setPCE1($PCE1);
            $gaz->setPCE2($PCE2);
            $gaz->setPCE3($PCE3);
            $gaz->setPCE4($PCE4);
            $gaz->setPCE5($PCE5);
            $gaz->setPCE6($PCE6);
            $gaz->setPCE7($PCE7);
            $gaz->setPCE8($PCE8);
            $gaz->setPCE9($PCE9);
            $gaz->setPCE10($PCE10);
            $gaz->setPCE11($PCE11);
            $gaz->setPCE12($PCE12);
            $gaz->setPCE13($PCE13);
            $gaz->setPCE14($PCE14);
            $gaz->setPCE15($PCE15);
            $gaz->setPCE16($PCE16);
            $gaz->setPCE17($PCE17);
            $gaz->setPCE18($PCE18);
            $gaz->setPCE19($PCE19);
            $gaz->setPCE20($PCE20);
            $em = $this->getDoctrine()->getManager();
            $em->persist($gaz);
            $em->flush();
        }
        if ($electrique !== null) {
            $PDL1 = $request->request->get('PDL1');
            $PDL2 = $request->request->get('PDL2');
            $PDL3 = $request->request->get('PDL3');
            $PDL4 = $request->request->get('PDL4');
            $PDL5 = $request->request->get('PDL5');
            $PDL6 = $request->request->get('PDL6');
            $PDL7 = $request->request->get('PDL7');
            $PDL8 = $request->request->get('PDL8');
            $PDL9 = $request->request->get('PDL9');
            $PDL10 = $request->request->get('PDL10');
            $PDL11 = $request->request->get('PDL11');
            $PDL12 = $request->request->get('PDL12');
            $PDL13 = $request->request->get('PDL13');
            $PDL14 = $request->request->get('PDL14');
            $PDL15 = $request->request->get('PDL15');
            $PDL16 = $request->request->get('PDL16');
            $PDL17 = $request->request->get('PDL17');
            $PDL18 = $request->request->get('PDL18');
            $PDL19 = $request->request->get('PDL19');
            $PDL20 = $request->request->get('PDL20');
            $electric = new Electricite();
            $electric->setClient($client);
            $electric->setPDL1($PDL1);
            $electric->setPDL2($PDL2);
            $electric->setPDL3($PDL3);
            $electric->setPDL4($PDL4);
            $electric->setPDL5($PDL5);
            $electric->setPDL6($PDL6);
            $electric->setPDL7($PDL7);
            $electric->setPDL8($PDL8);
            $electric->setPDL9($PDL9);
            $electric->setPDL10($PDL10);
            $electric->setPDL11($PDL11);
            $electric->setPDL12($PDL12);
            $electric->setPDL13($PDL13);
            $electric->setPDL14($PDL14);
            $electric->setPDL15($PDL15);
            $electric->setPDL16($PDL16);
            $electric->setPDL17($PDL17);
            $electric->setPDL18($PDL18);
            $electric->setPDL19($PDL19);
            $electric->setPDL20($PDL20);

            $em = $this->getDoctrine()->getManager();
            $em->persist($electric);
            $em->flush();
        }
        $email = (new Email())
            ->to($client->getMail())
            ->subject('Demande d\'autorisation')
            ->html($this->renderView('demande/clientMessage.html.twig',[
                            'nom' => $client->getNameOfSignatory(),
                            'email' => $client->getMail(),
                            'entreprise' => $client->getmermaid(),
                            'siren' => $client->getSocialReason(),
                            'fonction' => $client->getFunction(),
                            'gazplus20' => $gaz20 ,
                            'electricplus20' =>$electric20,
                            'id_client' => $client->getId(),
                           'id_gaz' => ($gaz !== null) ? $gaz->getId() : 0,
                            'id_electric' => ($electric !== null) ? $electric->getId() : 0
                       ])
            );
            $mailer->send($email);

       return $this->redirectToRoute('client_index');
    }
    /** Reponse client click j'autorise
     * @Route("/email/response/", name="Email_demandee",methods={"GET","POST"})
     */
    public function RenvoyerMail(Request $request,ClientRepository $clientRepository,GazRepository $gazRepository,ElectriciteRepository $electriciteRepository){
       
        $idgaz = $request->query->get('gaz');
        $idCli = $request->query->get('id');
        $gaz20 = $request->query->get('gazplus');
        $electricite20 = $request->query->get('electriciteplus');
        $client = $clientRepository->find($idCli);
        $idelectric = $request->query->get('electric');
        if ($idgaz !== 0) {
            $gaz = $gazRepository->find($idgaz);
            if ($gaz !== null) {
                $client = $gaz->getClient();
                $mj = new \Mailjet\Client('4bb23ab13bf97d45b8a20429b73bd983', '2fc34f53d406022f6c964562bb84bb1b', true, ['version' => 'v3.1']);
                $mj->addRequestOption('verify', false);
                $body = [
                    'Messages' => [
                        [
                            'From' => [
                                'Email' => "sandinho10herios@gmail.com",
                                'Name' => "Access Energie"
                            ],
                            'To' => [
                                [
                                    'Email' => $client->getMail(),
                                    'Name' => $client->getNameOfSignatory()
                                ]
                            ],
                            'Subject' => "Greetings from Mailjet.",
                            'TextPart' => "My first Mailjet email",
                            'HTMLPart' => $this->renderView('demande/gazMessage.html.twig', [
                                'nom' => $client->getNameOfSignatory(),
                                'email' => $client->getMail(),
                                'entreprise' => $client->getmermaid(),
                                'siren' => $client->getSocialReason(),
                                'fonction' => $client->getFunction(),
                                "PCE1" => $gaz->getPCE1(),
                                "PCE2" => $gaz->getPCE2(),
                                "PCE3" => $gaz->getPCE3(),
                                "PCE4" => $gaz->getPCE4(),
                                "PCE5" => $gaz->getPCE5(),
                                "PCE6" => $gaz->getPCE6(),
                                "PCE7" => $gaz->getPCE7(),
                                "PCE8" => $gaz->getPCE8(),
                                "PCE9" => $gaz->getPCE9(),
                                "PCE10" => $gaz->getPCE10(),
                                "PCE11" => $gaz->getPCE11(),
                                "PCE12" => $gaz->getPCE12(),
                                "PCE13" => $gaz->getPCE13(),
                                "PCE14" => $gaz->getPCE14(),
                                "PCE15" => $gaz->getPCE15(),
                                "PCE16" => $gaz->getPCE16(),
                                "PCE17" => $gaz->getPCE17(),
                                "PCE18" => $gaz->getPCE18(),
                                "PCE19" => $gaz->getPCE19(),
                                "PCE20" => $gaz->getPCE20(),
                            ])

                        ]
                    ]
                ];
                $response = $mj->post(Resources::$Email, ['body' => $body]);
                $response->success();
                $response->getData();
                if ($response->success() == true) {
                    $client->setValider(true);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($client);
                    $em->flush();
                }
            } 
        }
        if ($idelectric !== 0) {
            $electric = $electriciteRepository->find($idelectric);
            if ($electric !== null) {
                $client = $electric->getClient();
                $mj = new \Mailjet\Client('4bb23ab13bf97d45b8a20429b73bd983', '2fc34f53d406022f6c964562bb84bb1b', true, ['version' => 'v3.1']);
                $mj->addRequestOption('verify', false);
                $body = [
                        'Messages' => [
                            [
                                'From' => [
                                    'Email' => "sandinho10herios@gmail.com",
                                    'Name' => "Access Energie"
                                ],
                                'To' => [
                                    [
                                        'Email' => "morianthes04herbin@gmail.com",
                                        'Name' => "theos"
                                    ]
                                ],
                                'Subject' => "Greetings from Mailjet.",
                                'TextPart' => "My first Mailjet email",
                                'HTMLPart' => $this->renderView('demande/electriciteMessage.html.twig', [
                                    'nom' => $client->getNameOfSignatory(),
                                    'email' => $client->getMail(),
                                    'entreprise' => $client->getmermaid(),
                                    'siren' => $client->getSocialReason(),
                                    'fonction' => $client->getFunction(),
                                    "PDL1" => $electric->getPDL1(),
                                    "PDL2" => $electric->getPDL2(),
                                    "PDL3" => $electric->getPDL3(),
                                    "PDL4" => $electric->getPDL4(),
                                    "PDL5" => $electric->getPDL5(),
                                    "PDL6" => $electric->getPDL6(),
                                    "PDL7" => $electric->getPDL7(),
                                    "PDL8" => $electric->getPDL8(),
                                    "PDL9" => $electric->getPDL9(),
                                    "PDL10" => $electric->getPDL10(),
                                    "PDL11" => $electric->getPDL11(),
                                    "PDL12" => $electric->getPDL12(),
                                    "PDL13" => $electric->getPDL13(),
                                    "PDL14" => $electric->getPDL14(),
                                    "PDL15" => $electric->getPDL15(),
                                    "PDL16" => $electric->getPDL16(),
                                    "PDL17" => $electric->getPDL17(),
                                    "PDL18" => $electric->getPDL18(),
                                    "PDL19" => $electric->getPDL19(),
                                    "PDL20" => $electric->getPDL20(),
                                ])

                            ]
                        ]
                    ];
                $response = $mj->post(Resources::$Email, ['body' => $body]);
                $response->success();
                $response->getData();

                if ($response->success() == true) {
                    $client->setValider(true);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($client);
                    $em->flush();
                }
            }
        
                if ($gaz20 == "+ DE 20 GAZ") {
                    $client = $gaz->getClient();
                    $mj = new \Mailjet\Client('4bb23ab13bf97d45b8a20429b73bd983', '2fc34f53d406022f6c964562bb84bb1b', true, ['version' => 'v3.1']);
                    $mj->addRequestOption('verify', false);
                    $body = [
                        'Messages' => [
                            [
                                'From' => [
                                    'Email' => "sandinho10herios@gmail.com",
                                    'Name' => "Access Energie"
                                ],
                                'To' => [
                                    [
                                        'Email' => $client->getMail(),
                                        'Name' => $client->getNameOfSignatory()
                                    ]
                                ],
                                'Subject' => "Greetings from Mailjet.",
                                'TextPart' => "My first Mailjet email",
                                'HTMLPart' => $this->renderView('demande/gazplus20Message.html.twig', [
                                    'nom' => $client->getNameOfSignatory(),
                                    'email' => $client->getMail(),
                                    'entreprise' => $client->getmermaid(),
                                    'siren' => $client->getSocialReason(),
                                    'fonction' => $client->getFunction(),
                                ])

                            ]
                        ]
                    ];
                    $response = $mj->post(Resources::$Email, ['body' => $body]);
                    $response->success();
                    $response->getData();
                    if ($response->success() == true) {
                        $client->setValider(true);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($client);
                        $em->flush();
                    }
                }
                if ($gaz20 == "+ DE 20 GAZ") {
                    $client = $gaz->getClient();
                   // $client = $electric->getClient();
                    $mj = new \Mailjet\Client('4bb23ab13bf97d45b8a20429b73bd983', '2fc34f53d406022f6c964562bb84bb1b', true, ['version' => 'v3.1']);
                    $mj->addRequestOption('verify', false);
                    $body = [
                        'Messages' => [
                            [
                                'From' => [
                                    'Email' => "sandinho10herios@gmail.com",
                                    'Name' => "Access Energie"
                                ],
                                'To' => [
                                    [
                                        'Email' => $client->getMail(),
                                        'Name' => $client->getNameOfSignatory()
                                    ]
                                ],
                                'Subject' => "Greetings from Mailjet.",
                                'TextPart' => "My first Mailjet email",
                                'HTMLPart' => $this->renderView('demande/gazplus20Message.html.twig', [
                                    'nom' => $client->getNameOfSignatory(),
                                    'email' => $client->getMail(),
                                    'entreprise' => $client->getmermaid(),
                                    'siren' => $client->getSocialReason(),
                                    'fonction' => $client->getFunction(),
                                ])

                            ]
                        ]
                    ];
                    $response = $mj->post(Resources::$Email, ['body' => $body]);
                    $response->success();
                    $response->getData();
                    if ($response->success() == true) {
                        $client->setValider(true);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($client);
                        $em->flush();
                    }
                }
            if ($electricite20 == "+ DE 20 ELECTRIQUE") {
                $client = $electric->getClient();
                $mj = new \Mailjet\Client('4bb23ab13bf97d45b8a20429b73bd983', '2fc34f53d406022f6c964562bb84bb1b', true, ['version' => 'v3.1']);
                $mj->addRequestOption('verify', false);
                $body = [
                    'Messages' => [
                        [
                            'From' => [
                                'Email' => "sandinho10herios@gmail.com",
                                'Name' => "Access Energie"
                            ],
                            'To' => [
                                [
                                    'Email' => $client->getMail(),
                                    'Name' => $client->getNameOfSignatory()
                                ]
                            ],
                            'Subject' => "Greetings from Mailjet.",
                            'TextPart' => "My first Mailjet email",
                            'HTMLPart' => $this->renderView('demande/gazplus20Message.html.twig', [
                                'nom' => $client->getNameOfSignatory(),
                                'email' => $client->getMail(),
                                'entreprise' => $client->getmermaid(),
                                'siren' => $client->getSocialReason(),
                                'fonction' => $client->getFunction(),
                            ])

                        ]
                    ]
                ];
                $response = $mj->post(Resources::$Email, ['body' => $body]);
                $response->success();
                $response->getData();
                if ($response->success() == true) {
                    $client->setValider(true);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($client);
                    $em->flush();
                }
            }
            }
            
        
        return $this->render('demande/message.html.twig');
        
       // return $this->addFlash('succes', 'Votre autorisation à bien était prise en compte et nous vous en remercions.
//Une copie de cette autorisation, vient de vous être transmise par mail');

    }
}
