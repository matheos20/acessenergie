<?php


namespace App\Form;


use App\Entity\Electricite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElectriciteRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('PDL1')
            ->add('PDL2')
            ->add('PDL3')
            ->add('PDL4')
            ->add('PDL5')
            ->add('PDL6')
            ->add('PDL7')
            ->add('PDL8')
            ->add('PDL9')
            ->add('PDL10')
            ->add('PDL11')
            ->add('PDL12')
            ->add('PDL13')
            ->add('PDL14')
            ->add('PDL15')
            ->add('PDL16')
            ->add('PDL17')
            ->add('PDL18')
            ->add('PDL19')
            ->add('PDL20')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Electricite::class,
        ]);
    }
}