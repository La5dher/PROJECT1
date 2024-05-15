<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideonform(),
            IntegerField::new('NCE'),
            TextField::new('niveau'),
            TextField::new('institut'),
            DateField::new('date_naissance'),
            ArrayField::new('stages'),
            /*ChoiceType::new('stages'), [
                'choices'  => [
                    'Stage initiation' => null,
                    'Stage perfectionnement' => true,
                    'Stage de fin détude' => false,
                ]
            ]*/
        ];
    }
    
}
