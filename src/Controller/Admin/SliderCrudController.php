<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Slider;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SliderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slider::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('photo'),
            IntegerField::new('ordre'),
            DateTimeField::new('createdAt')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            
        ];
    }
    public function createEntity( string $entityFqcn)
    {
        $slide = new $entityFqcn;
        $slide->setCreatedAt(new \DateTime);
        return $slide;
    }


}
