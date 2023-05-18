<?php

namespace App\Form;

use App\Entity\PostForumDb1;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostForumDBFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('id_subcateg')
            //->add('id_user')
            ->add('text',TextareaType::class,[
                'attr'=> array(
                    'class'=>'bg-transparent block mt-10 border-b-2 w-full h-60 text-2xl outline-none',
                    'placeholder'=>'Adauga postarea ...'
                ),
                'label'=>false
                ])
    
            //->add('timp')
            //->add('approved')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PostForumDb1::class,
        ]);
    }
}
