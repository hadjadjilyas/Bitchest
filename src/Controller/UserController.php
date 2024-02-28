<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Wallet;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        // Assurez-vous qu'un utilisateur est connecté
        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }

        // Récupérer le rôle de l'utilisateur
        $roles = $user->getRoles();

        // Si l'utilisateur a le rôle ADMIN, récupérez tous les utilisateurs
        if (in_array('ROLE_ADMIN', $roles)) {
            $users = $userRepository->findAll();
        } else {
            // Sinon, récupérez l'utilisateur connecté
            $users = [$user];
        }

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }   

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
    
            // Créer un nouveau wallet et l'associer à l'utilisateur
            $wallet = new Wallet();
            // Vous pouvez initialiser les valeurs du wallet si nécessaire
            // $wallet->setTotalBalance(0.0);
            // $wallet->setCryptoBalance(0.0);
            // $wallet->setUsuableBalance(500.0);
    
            // Associer le wallet à l'utilisateur
            $user->setHasWallet($wallet);
    
            // Persister l'utilisateur et le wallet dans la base de données
            $entityManager->persist($user);
            $entityManager->persist($wallet);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
{
    // Récupérer l'utilisateur connecté
    $currentUser = $this->getUser();

    // Vérifier si l'utilisateur connecté est administrateur
    $isAdmin = in_array('ROLE_ADMIN', $currentUser->getRoles());

    // Créer le formulaire
    $form = $this->createForm(UserType::class, $user);

    // Si l'utilisateur n'est pas administrateur, supprimer le champ 'roles'
    if (!$isAdmin) {
        $form->remove('roles');
    }

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            )
        );
        $entityManager->flush();

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('user/edit.html.twig', [
        'user' => $user,
        'form' => $form->createView(),
    ]);
}


    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}