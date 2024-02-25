<?php

namespace App\Controller;

use App\Entity\Transaction;
use App\Entity\Crypto;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use App\Repository\CryptoRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transaction')]
class TransactionController extends AbstractController
{
    #[Route('/', name: 'app_transaction_index', methods: ['GET'])]
    public function index(TransactionRepository $transactionRepository): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        // Assurez-vous qu'un utilisateur est connecté
        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }

        // Récupérer le rôle de l'utilisateur
        $roles = $user->getRoles();

        // Si l'utilisateur a le rôle ADMIN, récupérez toutes les transactions
        if (in_array('ROLE_ADMIN', $roles)) {
            $transactions = $transactionRepository->findAll();
        } else {
            // Sinon, récupérez les transactions liées à l'utilisateur connecté
            $transactions = $transactionRepository->findBy(['user' => $user]);
        }

        return $this->render('transaction/index.html.twig', [
            'transactions' => $transactions,
        ]);
    }
    #[Route('/new', name: 'app_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CryptoRepository $cryptoRepository): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $transactionType = $transaction->getTransactionType();
            $user = $transaction->getUser();

            // Check if the user has a wallet
            if (!$user || !$user->getHasWallet()) {
                return $this->render('transaction/new.html.twig', [
                    'transaction' => $transaction,
                    'form' => $form,
                    'error' => 'User does not have a wallet.',
                ]);
            }

            $wallet = $user->getHasWallet();

            if ($transactionType === 'buy') {
                // Buy logic
                if ($transaction->getTransactionAmount() > $wallet->getUsuableBalance()) {
                    return $this->render('transaction/new.html.twig', [
                        'transaction' => $transaction,
                        'form' => $form,
                        'error' => 'Insufficient funds in the wallet for buy transaction.',
                    ]);
                }

                $wallet->setUsuableBalance($wallet->getUsuableBalance() - $transaction->getTransactionAmount());
                $wallet->setCryptoBalance($wallet->getCryptoBalance() + $transaction->getTransactionAmount());

                // Update the user's ownedCryptos collection
                $crypto = $cryptoRepository->find($transaction->getCrypto());
                $user->addOwnedCrypto($crypto);

            } elseif ($transactionType === 'sell') {
                // Sell logic
                if ($transaction->getTransactionAmount() > $wallet->getCryptoBalance()) {
                    return $this->render('transaction/new.html.twig', [
                        'transaction' => $transaction,
                        'form' => $form,
                        'error' => 'Insufficient cryptocurrency in the wallet for sell transaction.',
                    ]);
                }

                $wallet->setCryptoBalance($wallet->getCryptoBalance() - $transaction->getTransactionAmount());
                $wallet->setUsuableBalance($wallet->getUsuableBalance() + $transaction->getTransactionAmount());

                // Update the user's ownedCryptos collection
                $crypto = $cryptoRepository->find($transaction->getCrypto());
               // $user->removeOwnedCrypto($crypto);
            }

            $entityManager->persist($transaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('transaction/new.html.twig', [
            'transaction' => $transaction,
            'form' => $form,
        ]);
    }
    
    #[Route('/{id}', name: 'app_transaction_show', methods: ['GET'])]
    public function show(Transaction $transaction): Response
    {
        return $this->render('transaction/show.html.twig', [
            'transaction' => $transaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($transaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
