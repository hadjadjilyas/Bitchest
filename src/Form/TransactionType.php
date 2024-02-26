<?php

namespace App\Form;

use App\Entity\Transaction;
use App\Entity\User;  // Assurez-vous d'importer la classe User
use App\Entity\Crypto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
=======
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
>>>>>>> 3fff90d32c92aa6b56128dd526bf4b893ce01cda

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
        ->add('date_transaction', DateTimeType::class, [
            'data' => new \DateTime(), // Initialise le champ avec la date actuelle
            'widget' => 'single_text',
            'html5' => false,
            'attr' => ['class' => 'js-datepicker form-control',
        ],
             'label' => 'Transaction date',
             'label_attr'  =>[
                    'class' => 'form-label mt-4'
                ]
        ])
        ->add('crypto', EntityType::class, [
            'class' => Crypto::class, // Assurez-vous de définir la classe d'entité correcte
            'choice_label' => 'Name',
            'placeholder' => 'Sélectionnez la cryptomonnaie',
            'attr' => [
                'class' => 'form-select form-control form-control-sm', // Ajoutez les classes Bootstrap pour styliser le champ
            ],
            'label' => 'Cryptomonnaie',
            'label_attr' => [
                'class' => 'form-label mt-4',
            ],
        ])
        ->add('quantity', NumberType::class, [
            'label' => 'Quantité',
            'attr' => [
                'class' => 'form-control', // Ajoutez les classes Bootstrap pour styliser le champ
                'placeholder' => 'Entrez la quantité',
            ],
            'label_attr' => [
                'class' => 'form-label mt-4',
            ],
        ])
        
          //  ->add('cryptomonaie')
        ->add('transaction_amount', MoneyType::class, [
            'label' => 'Montant de la transaction',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez le montant',
            ],
            'label_attr' => [
                'class' => 'form-label mt-4',
            ],
        ])


        ->add('transaction_type', ChoiceType::class, [
            'choices' => [
                'buy' => 'buy',
                'sell' => 'sell',
            ],
            'placeholder' => 'Sélectionnez le type de transaction',
            'attr' => [
                'class' => 'form-select', 
            ],
            'label' => 'Type de transaction',
            'label_attr' => [
                'class' => 'form-label mt-4',
            ],
        ])
        
        ->add('user', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'firstName',
            'attr' => [
                'class' => 'form-select', // Ajoutez les classes Bootstrap pour styliser le champ
            ],
            'label' => 'Utilisateur',
            'label_attr' => [
                'class' => 'form-label mt-4',
            ],
        ]);
        
=======
            ->add('date_transaction', DateTimeType::class, [
                'data' => new \DateTime(),
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('crypto', EntityType::class, [
                'class' => Crypto::class,
                'choice_label' => function (Crypto $crypto) {
                    return sprintf('%s - %.2f', $crypto->getName(), $crypto->getPrice());
                },
                'placeholder' => 'Sélectionnez la cryptomonnaie',
            ])
            ->add('quantity', NumberType::class)
            ->add('transaction_type', ChoiceType::class, [
                'choices' => [
                    'buy' => 'buy',
                    'sell' => 'sell',
                ],
                'placeholder' => 'Sélectionnez le type de transaction',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'firstName',
            ])
            ->addEventListener(FormEvents::SUBMIT, [$this, 'onSubmit']);
>>>>>>> 3fff90d32c92aa6b56128dd526bf4b893ce01cda
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }

    public function onSubmit(FormEvent $event): void
    {
        $form = $event->getForm();
        $transaction = $event->getData();

        // Vérifier si la crypto et la quantité sont définies
        if ($transaction->getCrypto() !== null && $transaction->getQuantity() !== null) {
            // Calculer le montant de la transaction
            $transactionAmount = $transaction->getCrypto()->getPrice() * $transaction->getQuantity();

            // Mettre à jour le champ transaction_amount dans l'objet Transaction
            $transaction->setTransactionAmount($transactionAmount);
        }
    }
}
