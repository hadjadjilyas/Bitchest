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

    $error = null; // Variable pour stocker le message d'erreur

    if ($form->isSubmitted() && $form->isValid()) {
        $transactionType = $transaction->getTransactionType();
        $user = $transaction->getUser();

        if (!$user || !$user->getHasWallet()) {
            $error = 'User does not have a wallet.';
        } else {
            $wallet = $user->getHasWallet();

            if ($transactionType === 'buy') {
                if ($transaction->getTransactionAmount() > $wallet->getUsuableBalance()) {
                    $error = 'Insufficient funds in the wallet for buy transaction.';
                } else {
                    $wallet->setUsuableBalance($wallet->getUsuableBalance() - $transaction->getTransactionAmount());
                    $wallet->setCryptoBalance($wallet->getCryptoBalance() + $transaction->getTransactionAmount());

                    $crypto = $cryptoRepository->find($transaction->getCrypto());
                    $user->addOwnedCrypto($crypto);
                }
            } elseif ($transactionType === 'sell') {
                $wallet->setCryptoBalance($wallet->getCryptoBalance() - $transaction->getTransactionAmount());
                $wallet->setUsuableBalance($wallet->getUsuableBalance() + $transaction->getTransactionAmount());

                $crypto = $cryptoRepository->find($transaction->getCrypto());

                if (!$this->isSellPossible($user, $crypto, $transaction->getQuantity())) {
                    $error = 'Cannot sell. Quantity is insufficient.';
                }
            }

            if (!$error) {
                $entityManager->persist($transaction);
                $entityManager->flush();

                return $this->redirectToRoute('app_transaction_index', [], Response::HTTP_SEE_OTHER);
            }
        }
    }

    return $this->render('transaction/new.html.twig', [
        'transaction' => $transaction,
        'form' => $form,
        'error' => $error, // Passer le message d'erreur à la vue
    ]);
}


    private function isSellPossible($user, $crypto, $sellQuantity): bool
    {
        $totalQuantity = 0;

        foreach ($crypto->getTransactions() as $transaction) {
            if ($transaction->getUser() === $user) {
                if ($transaction->getTransactionType() === 'buy') {
                    $totalQuantity += $transaction->getQuantity();
                } elseif ($transaction->getTransactionType() === 'sell') {
                    $totalQuantity -= $transaction->getQuantity();
                }
            }
        }

        return $totalQuantity >= $sellQuantity;
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
