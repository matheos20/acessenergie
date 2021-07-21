<?php


namespace App\Form;


use App\Form\Request\AuthorizationRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorizationRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('isNaturalGaz', CheckboxType::class)
            ->add('isElectricite', CheckboxType::class)
            ->add('gazNatural', GazType::class)
            ->add('electricite', ElectriciteRequestType::class)
            ->add('isMoreThanTwentyGaz', CheckboxType::class)
            ->add('isTwentyGaz', CheckboxType::class)
            ->add('isMoreThanTwentyElec', CheckboxType::class)
            ->add('isTwentyElec', CheckboxType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AuthorizationRequest::class,
        ]);
    }
}