<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\Stage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',null,[
                'label' => 'Itern name'
            ])
            ->add('description',null,[
                'label' => 'Description'
            ])
            ->add('date_debut', null, [
                'widget' => 'single_text',
                'label'=>'End date'
            ])
            ->add('date_fin', null, [
                'widget' => 'single_text',
                'label'=>'Start date'
            ])
            ->add('id_entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label' => 'id',
            ])
            /*->add('id_etudiant', EntityType::class, [
                'class' => Etudiant::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
