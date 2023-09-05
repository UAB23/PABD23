<?php

namespace App\Form;

use App\Entity\ActivitateStiintificaDB;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ActivitateStiintificaDBFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('tip', IntegerType::class,[
            'attr'=> array(
                'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none',
                'placeholder'=>'Adauga tip ...'
            ),
            'label'=>false
        ])

        ->add('descriere',TextareaType::class,[
            'attr'=> array(
                'class'=>'bg-transparent block mt-10 border-b-2 w-full h-60 text-6xl outline-none',
                'placeholder'=>'Adauga descrierea ...'
            ),
            'label'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActivitateStiintificaDB::class,
        ]);
    }
}
