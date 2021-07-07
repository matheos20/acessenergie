<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('social_reason',TextType::class,['label'=>'Raison sociale'])
            ->add('mermaid', TextType::class,['label'=>'Siren'])
            ->add('address',TextType::class,['label'=>'Adresse du siège'])
            ->add('name_of_signatory',TextType::class,['label'=>'Nom du Signataire'])
            ->add('function',TextType::class,['label'=>'Fonction'])
            ->add('mail',TextType::class,['label'=>'Adresse mail'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
