<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnvoyeMailController extends AbstractController
{
    /**
     * @Route("/envoye/mail", name="envoye_mail")
     */
    public function index(): Response
    {
        return $this->render('envoye_mail/index.html.twig', [
            'controller_name' => 'EnvoyeMailController',
        ]);
    }
}
