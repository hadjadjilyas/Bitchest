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

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('date_transaction', DateTimeType::class, [
            'data' => new \DateTime(), // Initialise le champ avec la date actuelle
            'widget' => 'single_text',
            'html5' => false,
            'attr' => ['class' => 'js-datepicker'],
        ])
        ->add('crypto', EntityType::class, [
            'class' => Crypto::class, // Set the correct entity class
            'choice_label' => 'Name',
            'placeholder' => 'Sélectionnez la cryptomonnaie',
        ])
            ->add('quantity')
          //  ->add('cryptomonaie')
            ->add('transaction_amount')
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
