<?php


namespace App\Form;


use App\Entity\Electricite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElectriciteRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('PDL1',TextType::class)
            ->add('PDL2', TextType::class)
            ->add('PDL3', TextType::class)
            ->add('PDL4', TextType::class)
            ->add('PDL5', TextType::class)
            ->add('PDL6', TextType::class)
            ->add('PDL7', TextType::class)
            ->add('PDL8', TextType::class)
            ->add('PDL9', TextType::class)
            ->add('PDL10', TextType::class)
            ->add('PDL11', TextType::class)
            ->add('PDL12', TextType::class)
            ->add('PDL13', TextType::class)
            ->add('PDL14', TextType::class)
            ->add('PDL15', TextType::class)
            ->add('PDL16', TextType::class)
            ->add('PDL17', TextType::class)
            ->add('PDL18', TextType::class)
            ->add('PDL19', TextType::class)
            ->add('PDL20', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Electricite::class,
        ]);
    }
}
