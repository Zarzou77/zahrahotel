<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        $form=$this->createForm(ContactType::class);
        return $this->renderForm('contact/index.html.twig', [
            'contact' => "Vous Voulez plus d'information ,Contactez-Nous !!",
            'formulaire'=> $form
        ]);
    }
}
