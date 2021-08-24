<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder,MailerInterface $mailer): Response
    {
       $user = new User();
        $user->setValidation(false);
       $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setIsValid(false);
            $token = uniqid();
            $user->setTokenToConfirmAccount($token);
            $manager->persist($user);
            $manager->flush();
           $mailToSendUser = (new Email())
                ->to($user->getEmail())
                ->subject('validation d\'inscription ')
                ->html($this->renderView('security/userValidation.html.twig',[
                    'id' => $user->getId(),
                    'nom' =>$user->getUsername()
                ]));
            $mail = (new Email())
                ->to('sandinho10herios@gmail.com')
                ->subject('validation d\'inscription')
                ->html($this->renderView('security/validation.html.twig',[
                    'id' => $user->getId(),
                    'token' => $token->getTokenToConfirmAccount()
                ]));
                $mailer->send($mailToSendUser);
                $mailer->send($mail);

            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils){

        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig',['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/validation/{id}", name="validation_compte")
     */
    public function ValidateCompteClient(User $user,EntityManagerInterface $manager){
        $user->setValidation(true);
        $manager->persist($user);
        $manager->flush();
        return $this->redirectToRoute('security_login');
    }
    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){

    }
}
