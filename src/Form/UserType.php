<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstName', null, ['attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'mt-4']])
            ->add('lastName' , null, ['attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'mt-4']])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'mt-4']])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Password', 'attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'mt-4']],
                'second_options' => ['label' => 'Repeat Password', 'attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'mt-4']],
                'invalid_message' => 'The password fields must match.',
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Admin' => 'ROLE_ADMIN',
                ],
                'label_attr' => ['class' => 'mt-4'],
                'multiple' => true,
                'expanded' => true,
                'label' => 'Roles',
                'required' => true,
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}