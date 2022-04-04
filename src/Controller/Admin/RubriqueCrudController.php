<?php

namespace App\Controller\Admin;

use App\Entity\Rubrique;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RubriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rubrique::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('intitule', 'Intitulé')
        ];
    }
    
}
