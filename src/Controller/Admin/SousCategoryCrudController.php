<?php

namespace App\Controller\Admin;

use App\Entity\SousCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SousCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SousCategory::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm()
            ->hideOnIndex()
            ->hideOnForm();
        yield TextField::new('name', 'Nom');
        yield TextareaField::new('description', 'Description');

    }

}
