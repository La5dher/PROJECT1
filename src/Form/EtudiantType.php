<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Stage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('login',null,[
                'label' => 'username'
            ])
            //->add('roles')
            ->add('password',null,[
                'label' => 'Password'
            ])
            ->add('NCE',null,[
                'label' => '
                ID number'
            ])
            ->add('nom',null,[
                'label' => 'Last Name'
            ])
            ->add('prenom',null,[
                'label' => 'First Name'
            ])
            ->add('date_naissance', null, [
                'widget' => 'single_text',
                'label'=>'Birthday'
            ])
            ->add('email',null,[
                'label' => 'Email'
            ])
            ->add('niveau',null,[
                'label' => 'Level'
            ])
            ->add('institut',null,[
                'label' => 'Institut'
            ])
            ->add('adresse',null,[
                'label' => 'Adress'
            ])
            ->add('telephone',null,[
                'label' => 'Phone Number'
            ])
            ->add('fixe',null,[
                'label' => 'Fix Number'
            ])
            
           
            ->add('description')
            ->add('reseaux_sociaux',null,[
                'label' => 'Social networks'
            ])
           
            
            
            
            /*->add('stages', EntityType::class, [
                'class' => Stage::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
