<?php

namespace App\Form;

use App\Form\Request;
use App\Form\Request\ClientRecherche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('social_reason', TextType::class, [
              'required' => false,
              'label' => false,
              'attr' =>[
                  'placeholder' =>'recherche'
              ]  
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientRecherche::class,
            'method' =>'get',
            'csrf_protection' =>false,
        ]);
    }
}
