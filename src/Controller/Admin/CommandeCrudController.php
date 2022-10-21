<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('date_arrivee')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            DateTimeField::new('date_depart')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('telephone'),
            TextField::new('email'),
            DateTimeField::new('dateEnregistrement', "Date de paiement")->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            AssociationField::new('chambre')->onlyOnForms(),
        ];
    }
    public function createEntity(string $entityFqcn)
    {
        $commande = new $entityFqcn;
        $commande->setCreatedAt(new DateTime);
        return $commande;
    }

}
