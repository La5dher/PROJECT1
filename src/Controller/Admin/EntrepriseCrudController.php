<?php

namespace App\Controller\Admin;

use App\Entity\Entreprise;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\HttpFoundation\Response;

class EntrepriseCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE = 'duplicate';

    public static function getEntityFqcn(): string
    {
        return Entreprise::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(self::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicateEntreprise')
            ->setCssClass('btn btn-info');

        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate)
            ->reorder(Crud::PAGE_EDIT, [self::ACTION_DUPLICATE, Action::SAVE_AND_RETURN]);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('NomEntreprise'),
            TextField::new('Categorie'),
            TextEditorField::new('Description'),
            #DateField::new('DateDeCreation'),
            #IntegerField::new('Fix'),
            ArrayField::new('stages'),
        ];
    }
    
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Entreprise) {
            return;
        }
    
        parent::persistEntity($em, $entityInstance);
    }

    public function duplicateEntreprise(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
    ): Response {
        /** @var Entreprise $entreprise */
        $entreprise = $context->getEntity()->getInstance();

        $duplicateEntreprise = clone $entreprise;

        parent::persistEntity($em, $duplicatedProduct);

        $url = $adminUrlGenerator->setController(self::class)
            ->setAction(Action::DETAIL)
            ->setEntityId($duplicateEntreprise->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
    

    
}
