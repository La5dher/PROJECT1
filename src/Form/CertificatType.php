<?php

namespace App\Form;

use App\Entity\Certificat;
use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CertificatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'label' => 'Title'
            ])
            ->add('description', null, [
                'label' => 'Description'
            ])
            ->add('place', null, [
                'label' => 'Place'
            ])
            ->add('domaine', null, [
                'label' => 'Domain'
            ])
            ->add('niveau', null, [
                'label' => 'Level'
            ])
            ->add('id_etudiant', EntityType::class, [
                'class' => Etudiant::class,
                'choice_label' => 'id',
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Certificat::class,
        ]);
    }
}
