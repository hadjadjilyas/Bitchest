<?php

namespace App\Controller;

use App\Entity\Wallet;
use App\Form\WalletType;
use App\Repository\WalletRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wallet')]
class WalletController extends AbstractController
{
    #[Route('/', name: 'app_wallet_index', methods: ['GET'])]
    public function index(WalletRepository $walletRepository): Response
{
    // Récupérer l'utilisateur connecté
    $user = $this->getUser();

    // Assurez-vous qu'un utilisateur est connecté
    if (!$user) {
        throw $this->createAccessDeniedException('Vous devez être connecté pour accéder à cette page.');
    }

    // Si l'utilisateur a le rôle ADMIN, récupérez tous les portefeuilles
    if (in_array('ROLE_ADMIN', $user->getRoles())) {
        $wallets = $walletRepository->findAll();
    } else {
        // Sinon, récupérez le portefeuille lié à l'utilisateur connecté
        $wallet = $user->getHasWallet();

        // Vérifiez si l'utilisateur a un portefeuille
        if (!$wallet) {
            throw $this->createNotFoundException('Cet utilisateur n\'a pas de portefeuille.');
        }

        $wallets = [$wallet]; // Mettez le portefeuille dans un tableau pour que le rendu soit cohérent avec le code précédent
    }

    return $this->render('wallet/index.html.twig', [
        'wallets' => $wallets,
    ]);
}

    #[Route('/new', name: 'app_wallet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $wallet = new Wallet();
        $form = $this->createForm(WalletType::class, $wallet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($wallet);
            $entityManager->flush();

            return $this->redirectToRoute('app_wallet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('wallet/new.html.twig', [
            'wallet' => $wallet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wallet_show', methods: ['GET'])]
    public function show(Wallet $wallet): Response
    {
        return $this->render('wallet/show.html.twig', [
            'wallet' => $wallet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_wallet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Wallet $wallet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WalletType::class, $wallet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_wallet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('wallet/edit.html.twig', [
            'wallet' => $wallet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wallet_delete', methods: ['POST'])]
    public function delete(Request $request, Wallet $wallet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wallet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($wallet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_wallet_index', [], Response::HTTP_SEE_OTHER);
    }
}
