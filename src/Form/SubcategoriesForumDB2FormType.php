<?php

namespace App\Form;

use App\Entity\SubcategoriesForumDb2;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubcategoriesForumDB2FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('id_categ')
            ->add('name')
            //->add('timp')
            //->add('approved')
            //->add('id_user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SubcategoriesForumDb2::class,
        ]);
    }
}
