<?php

namespace App\Form;

use App\Entity\Transaction;
use App\Entity\User;
use App\Entity\Crypto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
