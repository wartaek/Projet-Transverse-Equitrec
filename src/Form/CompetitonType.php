<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitonType extends AbstractType
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
            ->add('date', DateType::class, [
                'required' => true,
                'label' => 'Date:',
                'attr' => array(
                    'class' => "form-control"
                )
            ])
            ->add('ville', TextType::class, [
                'required' => true,
                'label' => 'Ville:',
                'attr' => array(
                    'class' => "form-control"
                )
            ])
            ->add('cp', TextType::class, [
                'required' => true,
                'label' => 'Cp:',
                'attr' => array(
                    'class' => "form-control"
                )
            ])
            ->add('adresse', TextType::class, [
                'required' => true,
                'label' => 'Adresse:',
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
