<?php

namespace App\Controller\Admin;

use App\Entity\Redacteur;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RedacteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Redacteur::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')
        ];
    }
    
}
