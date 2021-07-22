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
        $builder->add('isNaturalGaz', CheckboxType::class,['label'=>'gaz naturel'])
            ->add('isElectricite', CheckboxType::class,['label'=>'electricite'])
            ->add('gazNatural', GazType::class)
            ->add('electricite', ElectriciteRequestType::class)
            ->add('isMoreThanTwentyGaz', CheckboxType::class,['label'=>'+ de 20 compteurs'])
            ->add('isTwentyGaz', CheckboxType::class,['label'=>'- de 20 compteurs'])
            ->add('isMoreThanTwentyElec', CheckboxType::class,['label'=>'+ de 20 compteurs'])
            ->add('isTwentyElec', CheckboxType::class,['label'=>'- de 20 compteurs']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AuthorizationRequest::class,
        ]);
    }
}