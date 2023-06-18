<?php

namespace App\Form;

use App\Entity\Sports;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SportsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('basketball')
            ->add('american_football')
            ->add('hockey')
            ->add('baseball')
            ->add('formula1')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sports::class,
        ]);
    }
}
