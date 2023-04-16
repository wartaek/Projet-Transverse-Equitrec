<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObstacleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'required' => true,
            'label' => 'Nom:',
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
