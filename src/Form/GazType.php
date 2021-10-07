<?php

namespace App\Form;

use App\Entity\Gaz;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GazType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('PCE1',TextType::class, ['required'=>false])
            ->add('PCE2',TextType::class, ['required'=>false])
            ->add('PCE3',TextType::class, ['required'=>false])
            ->add('PCE4',TextType::class, ['required'=>false])
            ->add('PCE5',TextType::class, ['required'=>false])
            ->add('PCE6',TextType::class, ['required'=>false])
            ->add('PCE7',TextType::class, ['required'=>false])
            ->add('PCE8',TextType::class, ['required'=>false])
            ->add('PCE9',TextType::class, ['required'=>false])
            ->add('PCE10',TextType::class, ['required'=>false])
            ->add('PCE11',TextType::class, ['required'=>false])
            ->add('PCE12',TextType::class, ['required'=>false])
            ->add('PCE13',TextType::class, ['required'=>false])
            ->add('PCE14',TextType::class, ['required'=>false])
            ->add('PCE15',TextType::class, ['required'=>false])
            ->add('PCE16',TextType::class, ['required'=>false])
            ->add('PCE17',TextType::class, ['required'=>false])
            ->add('PCE18',TextType::class, ['required'=>false])
            ->add('PCE19',TextType::class, ['required'=>false])
            ->add('PCE20',TextType::class, ['required'=>false])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gaz::class,
            'required' => false,

        ]);
    }
}
