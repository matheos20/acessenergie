<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Form\UserType;
use App\Repository\ClientRepository;
use App\Repository\ElectriciteRepository;
use App\Repository\UserRepository;
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
                ->subject('Inscription à ACCESS ACD SIGN en cours de validation ')
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
                    ->subject('Validation de votre espace ACCESS ACD SIGN ')
                    ->html(
                        $this->renderView(
                            'security/confirmationaccountuser.html.twig',
                            [
                                'username' => $user->getUsername(),
                                'name' => $user->getname(),
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

    /**
     * @Route("/listeUser", name="liste_user")
     */
    public function listeUtilisateur(UserRepository $user):response
    {
        return $this->render('security/listeUser.html.twig', [
            'users' => $user->findAll(),
        ]);
    }


    /**
     * @Route("user/{id}/edit", name="user_edit")
     */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('liste_user');
        }
       // dd($request);
        return $this->render('security/edit.html.twig', [
            'users' => $user,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("user/delete/{id}", name="user_delete")
     */
    public function delete(Request $request, User $user ,ClientRepository $clientRepository,ElectriciteRepository $electriciteRepository): Response
    {

            $clientes = $clientRepository->findBy(['user' => $user->getId()]);
            $electric = $electriciteRepository->findBy(['client' => $user->getId()]);

            $entityManager = $this->getDoctrine()->getManager();

                foreach ($electric as $electrics) {
                    $entityManager->remove($electrics);

               }

                foreach ($clientes as $clients) {
                    $entityManager->remove($clients);

                }

            $entityManager->remove($user);
            $entityManager->flush();
           // $entityManager = $this->getDoctrine()->getManager();
           // $entityManager->remove($user);
           // $entityManager->flush();
     

        return $this->redirectToRoute('liste_user');
    }
}
