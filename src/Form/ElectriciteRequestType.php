<?php


namespace App\Form;


use App\Entity\Electricite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElectriciteRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('PDL1', IntegerType::class)
            ->add('PDL2', IntegerType::class)
            ->add('PDL3', IntegerType::class)
            ->add('PDL4', IntegerType::class)
            ->add('PDL5', IntegerType::class)
            ->add('PDL6', IntegerType::class)
            ->add('PDL7', IntegerType::class)
            ->add('PDL8', IntegerType::class)
            ->add('PDL9', IntegerType::class)
            ->add('PDL10', IntegerType::class)
            ->add('PDL11', IntegerType::class)
            ->add('PDL12', IntegerType::class)
            ->add('PDL13', IntegerType::class)
            ->add('PDL14', IntegerType::class)
            ->add('PDL15', IntegerType::class)
            ->add('PDL16', IntegerType::class)
            ->add('PDL17', IntegerType::class)
            ->add('PDL18', IntegerType::class)
            ->add('PDL19', IntegerType::class)
            ->add('PDL20', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Electricite::class,
        ]);
    }
}
