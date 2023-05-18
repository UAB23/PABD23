<?php

namespace App\Form;

use App\Entity\ImagesDB;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ImagesDBFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class,[
            'attr'=> array(
                'class'=>'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none',
                'placeholder'=>'Adauga titlul ...'
            ),
            'label'=>false
        ])

        ->add('data_imagine', TextType::class,[
            'attr'=> array(
                'class'=>'bg-transparent block mt-10 border-b-2 w-full h-20 text-6xl outline-none',
                'placeholder'=>'Adauga data ...'
            ),
            'label'=>false
        ])
    

        ->add('description',TextareaType::class,[
            'attr'=> array(
                'class'=>'bg-transparent block mt-10 border-b-2 w-full h-60 text-6xl outline-none',
                'placeholder'=>'Adauga descrierea ...'
            ),
            'label'=>false
            ])

            ->add('imagePath', FileType::class, array(
                'required' => false,
                'mapped' => false
            ))

            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ImagesDB::class,
        ]);
    }
}
