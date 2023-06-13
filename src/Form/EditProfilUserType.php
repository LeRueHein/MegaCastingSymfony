<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProfilUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password', TextType::class,[
                'label' => 'password'
            ])
            ->add('IsVerified', ChoiceType::class,[
                'label' => 'Est vérifié',
                'choices' =>
                [
                    'oui' => 1,
                    'non' => 2
                ]
            ])

            ->add('nom', TextType::class,[
                'label' => 'nom'
            ])
            ->add('numtel', TextType::class,[
                'label' => 'Numéro téléphone'
            ])
            ->add('ville', TextType::class,[
                'label' => 'ville'
            ])
            ->add('Sauvegarder', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
