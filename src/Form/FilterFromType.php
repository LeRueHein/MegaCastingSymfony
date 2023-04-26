<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterFromType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typecontrats', EntityType::class, ['class' => 'App\Entity\TypeContrat', 'label' => false, 'multiple' => true, 'required' => false, "expanded" => true])
            ->add('metiers', EntityType::class, ['class' => 'App\Entity\Metier', 'label' => false, 'multiple' => true, 'required' => false,"expanded" => true])
            ->add('trier', SubmitType::class);


    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
