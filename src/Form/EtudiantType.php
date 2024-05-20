<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('login')
        //>add('roles')
        ->add('password')
        ->add('nom')
        ->add('description')
        ->add('reseaux_sociaux')
        ->add('telephone')
        ->add('fixe')
        ->add('adresse')
        ->add('email')
        ->add('prenom')
        ->add('nce')
        ->add('niveau')
        ->add('institut')
        ->add('date_naissance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}