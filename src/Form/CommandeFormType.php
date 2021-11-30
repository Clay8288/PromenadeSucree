<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',TextType::class, [
            'label' => 'Votre Nom, Prénom *',
            'row_attr' => [
                'class' => 'form'
            ],
            'attr' => [
                'placeholder' => 'Votre Nom, Prénom'
            ]
        ])
        ->add('telephone',TelType::class, [
            'label' => 'Votre numéro de téléphone *',
            'row_attr' => [
                'class' => 'form'
            ],
            'attr' => [
                'placeholder' => 'Votre Numéro de Téléphone'
            ]
        ])
        ->add('email',EmailType::class, [
            'label' => 'Votre E-mail *',
            'row_attr' => [
                'class' => 'form'
            ],
            'attr' => [
                'placeholder' => 'Votre E-mail'
            ]
        ])
        ->add('livraison',CheckboxType::class, [
            'label' => 'Livraison gratuite dans un rayon de 15 km avec un minimum d\'achat de 20€, au delà merci de faire la demande dans le mail)',
            'row_attr' => [
                'class' => 'form'
            ],
        ])
        ->add('adresse', TextType::class, [
            'label' => 'Adresse de livraison *',
            'row_attr' => [
                'class' => 'form'
            ],
            'attr' => ['rows' => 7,
            'placeholder' => 'Adresse, code postale, ville'],
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Message *',
            'row_attr' => [
                'class' => 'form'
            ],
            'attr' => ['rows' => 7,
            'placeholder' => 'Votre Message'],
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
