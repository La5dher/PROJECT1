<?php

namespace App\Form;

use App\Entity\Entreprise;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('login', null, [
            'label' => 'Username',
            'attr' => ['placeholder' => 'Enter your username'],
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Password',
            'attr' => ['placeholder' => 'Enter your password'],
        ])
        ->add('nom', null, [
            'label' => 'Last Name',
            'attr' => ['placeholder' => 'Enter your last name'],
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description',
            'attr' => ['rows' => 5, 'placeholder' => 'Enter a description about yourself or your company'],
        ])
        ->add('reseaux_sociaux', null, [
            'label' => 'Social Media Links',
            'attr' => ['placeholder' => 'Enter your social media links'],
        ])
        ->add('telephone', null, [
            'label' => 'Mobile Phone',
            'attr' => ['placeholder' => 'Enter your mobile phone number'],
        ])
        ->add('fixe', null, [
            'label' => 'Fixed Phone',
            'attr' => ['placeholder' => 'Enter your fixed phone number'],
        ])
        ->add('adresse', null, [
            'label' => 'Address',
            'attr' => ['placeholder' => 'Enter your address'],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => ['placeholder' => 'Enter your email address'],
        ])
        ->add('prenom', null, [
            'label' => 'First Name',
            'attr' => ['placeholder' => 'Enter your first name'],
        ])
        ->add('categorie', null, [
            'label' => 'Category',
            'attr' => ['placeholder' => 'Enter your category'],
        ])
        ->add('nom_entreprise', null, [
            'label' => 'Company Name',
            'attr' => ['placeholder' => 'Enter your company name'],
        ])
         ->add('date_de_creation',null, [
                'widget' => 'single_text',
                ])
        ;        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
