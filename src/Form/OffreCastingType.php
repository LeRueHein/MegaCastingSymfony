<?php

namespace App\Form;

use App\Entity\OffreCasting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreCastingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libel')
            ->add('reference')
            ->add('parutionDateTime')
            ->add('offreDateStart')
            ->add('offreDateEnd')
            ->add('localisation')
            ->add('civilite')
            ->add('client')
            ->add('typecontrat')
            ->add('metier')
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OffreCasting::class,
        ]);
    }
}
