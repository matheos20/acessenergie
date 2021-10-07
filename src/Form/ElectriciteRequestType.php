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
            ->add('PDL1',TextType::class, ['required'=>false])
            ->add('PDL2', TextType::class, ['required'=>false])
            ->add('PDL3', TextType::class, ['required'=>false])
            ->add('PDL4', TextType::class, ['required'=>false])
            ->add('PDL5', TextType::class, ['required'=>false])
            ->add('PDL6', TextType::class, ['required'=>false])
            ->add('PDL7', TextType::class, ['required'=>false])
            ->add('PDL8', TextType::class, ['required'=>false])
            ->add('PDL9', TextType::class, ['required'=>false])
            ->add('PDL10', TextType::class, ['required'=>false])
            ->add('PDL11', TextType::class, ['required'=>false])
            ->add('PDL12', TextType::class, ['required'=>false])
            ->add('PDL13', TextType::class, ['required'=>false])
            ->add('PDL14', TextType::class, ['required'=>false])
            ->add('PDL15', TextType::class, ['required'=>false])
            ->add('PDL16', TextType::class, ['required'=>false])
            ->add('PDL17', TextType::class, ['required'=>false])
            ->add('PDL18', TextType::class, ['required'=>false])
            ->add('PDL19', TextType::class, ['required'=>false])
            ->add('PDL20', TextType::class, ['required'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Electricite::class,
            'required' => false,
        ]);
    }
}
