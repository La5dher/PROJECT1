<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Experience;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre', null, [
            'label' => 'Title'
        ])
        ->add('description', null, [
            'label' => 'Description of the experience'
        ])
        ->add('place', null, [
            'label' => 'Place'
        ])
        ->add('duree', null, [
            'widget' => 'single_text'
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
            'data_class' => Experience::class,
        ]);
    }
}
