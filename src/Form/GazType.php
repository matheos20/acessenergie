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
            ->add('PCE1',TextType::class,['label'=>'PCE1'])
            ->add('PCE2',TextType::class,['label'=>'PCE2'])
            ->add('PCE3',TextType::class,['label'=>'PCE3'])
            ->add('PCE4',TextType::class,['label'=>'PCE4'])
            ->add('PCE5',TextType::class,['label'=>'PCE5'])
            ->add('PCE6',TextType::class,['label'=>'PCE6'])
            ->add('PCE7',TextType::class,['label'=>'PCE7'])
            ->add('PCE8',TextType::class,['label'=>'PCE8'])
            ->add('PCE9',TextType::class,['label'=>'PCE9'])
            ->add('PCE10',TextType::class,['label'=>'PCE10'])
            ->add('PCE11',TextType::class,['label'=>'PCE11'])
            ->add('PCE12',TextType::class,['label'=>'PCE12'])
            ->add('PCE13',TextType::class,['label'=>'PCE13'])
            ->add('PCE14',TextType::class,['label'=>'PCE14'])
            ->add('PCE15',TextType::class,['label'=>'PCE15'])
            ->add('PCE16',TextType::class,['label'=>'PCE16'])
            ->add('PCE17',TextType::class,['label'=>'PCE17'])
            ->add('PCE18',TextType::class,['label'=>'PCE18'])
            ->add('PCE19',TextType::class,['label'=>'PCE19'])
            ->add('PCE20',TextType::class,['label'=>'PCE20'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gaz::class,
        ]);
    }
}
