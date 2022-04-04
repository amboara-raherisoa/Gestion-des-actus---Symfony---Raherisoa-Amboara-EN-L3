<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class ActuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actu::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('theme', 'Thème'),
            TextField::new('titre'),
            TextEditorField::new('breveDescription', 'Brève description'),
            TextEditorField::new('contenu'),
            DateField::new('datePublication', 'Date de publication')->hideOnForm(),
            AssociationField::new('rubrique'),
            AssociationField::new('redacteur', 'Rédacteur')
        ];
    }
    
}
