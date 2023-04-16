<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('hauteur', TextType::class, [
            'required' => false,
            'label' => 'Hauteur:',
            'attr' => array(
                'class' => "form-control"
            )
        ])
        ->add('largeur', TextType::class, [
            'required' => false,
            'label' => 'Largeur:',
            'attr' => array(
                'class' => "form-control"
            )
        ])
        ->add('tempsMax', TextType::class, [
            'required' => false,
            'label' => 'Temps Maximum:',
            'attr' => array(
                'class' => "form-control"
            )
        ])
        ->add('pente', TextType::class, [
            'required' => false,
            'label' => 'Pente:',
            'attr' => array(
                'class' => "form-control"
            )
        ])
        ->add('front', TextType::class, [
            'required' => false,
            'label' => 'Front:',
            'attr' => array(
                'class' => "form-control"
            )
        ])->add('informations', TextType::class, [
            'required' => true,
            'label' => 'Informations:',
            'attr' => array(
                'class' => "form-control"
            )
        ])
        ->add('save', SubmitType::class, array(
            'label' => 'Valider',
            'attr' => array(
                'class' => 'btn btn-success'
            )
        ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
