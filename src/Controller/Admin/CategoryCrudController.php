<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->hideOnIndex()
            ->hideOnForm();
        yield TextField::new('name', 'Nom');
        yield TextField::new('title', 'Titre');
        yield TextareaField::new('description', 'Description');

        yield AssociationField::new('sousCat', 'Sous Catégories')
            ->setTemplatePath('admin/field/show-sous-category.html.twig')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]);

        yield ColorField::new('color', 'Couleur');
    }

}
