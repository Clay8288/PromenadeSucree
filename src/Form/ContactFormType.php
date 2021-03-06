<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Votre nom',
                'row_attr' => [
                    'class' => 'form'
                ],
                'attr' => [
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('email',EmailType::class, [
                'label' => 'Votre e-mail',
                'row_attr' => [
                    'class' => 'form'
                ],
                'attr' => [
                    'placeholder' => 'Votre e-mail'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'row_attr' => [
                    'class' => 'form'
                ],
                'attr' => ['rows' => 7,
                'placeholder' => 'Votre Message'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
