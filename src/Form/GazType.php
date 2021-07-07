<?php

namespace App\Form;

use App\Entity\Gaz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GazType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('PCE1')
            ->add('PCE2')
            ->add('PCE3')
            ->add('PCE4')
            ->add('PCE5')
            ->add('PCE6')
            ->add('PCE7')
            ->add('PCE8')
            ->add('PCE9')
            ->add('PCE10')
            ->add('PCE11')
            ->add('PCE12')
            ->add('PCE13')
            ->add('PCE14')
            ->add('PCE15')
            ->add('PCE16')
            ->add('PCE17')
            ->add('PCE18')
            ->add('PCE19')
            ->add('PCE20')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gaz::class,
        ]);
    }
}
