<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(
        Request $request,
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $encoder,
        MailerInterface $mailer
    ): Response {
        $user = new User();
        $user->setIsValid(false);
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
                ->html(
                    $this->renderView(
                        'security/userValidation.html.twig',
                        [
                            'id'  => $user->getId(),
                            'nom' => $user->getname(),
                            'prenom' => $user->getUsername(),
                        ]
                    )
                );
            $mail           = (new Email())
                ->to($this->getParameter('email_validator_account'))
                ->subject('validation d\'inscription')
                ->html(
                    $this->renderView(
                        'security/validation.html.twig',
                        [
                            'id'    => $user->getId(),
                            'token' => $token,
                            'nom' => $user->getname(),
                            'prenom' => $user->getUsername(),
                        ]
                    )
                );
            $mailer->send($mailToSendUser);
            $mailer->send($mail);

            return $this->redirectToRoute('security_login');
        }

        return $this->render(
            'security/registration.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/validation/{id}/{token}", name="validation_compte")
     * @param int                    $id
     * @param string                 $token
     * @param EntityManagerInterface $manager
     * @param MailerInterface        $mailer
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function validateAccountClient(
        int $id,
        string $token,
        EntityManagerInterface $manager,
        MailerInterface $mailer
    ) {
        $user = $manager->getRepository(User::class)->findOneBy(['id' => $id, 'tokenToConfirmAccount' => $token]);
        if ($user instanceof User) {
            $user->setIsValid(true);
            $manager->persist($user);
            $manager->flush();
            $mailer->send(
                (new Email())
                    ->to($user->getEmail())
                    ->subject('Confirmation de votre inscription ')
                    ->html(
                        $this->renderView(
                            'security/confirmationaccountuser.html.twig',
                            [
                                'username' => $user->getUsername(),
                            ]
                        )
                    )
            );

            return $this->redirectToRoute('security_login');
        }
        
        throw new AccessDeniedException();
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {

    }
}
