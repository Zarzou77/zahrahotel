<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Entity\Commande;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HotelController extends AbstractController
{
    #[Route('/', name: 'root')]
    public function root()
    {
        // redirige simplement vers la page d'accueil
        return $this->redirectToRoute('app_hotel');
    }
    #[Route('/hotel', name: 'app_hotel')]
    public function index(): Response
    {
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController'
        ]);
    }
    #[Route('/hotel/chambre', name: 'hotel_chambre')]
    public function chambre(ChambreRepository $repo): Response
    {
        $chambre = $repo->findAll();
        return $this->render('hotel/chambre.html.twig', [
            'chambre' => $chambre
        ]);
    }
    #[Route('/hotel/restaurant', name: 'hotel_restaurant')]
    public function restaurant(): Response
    {
        
        return $this->render('hotel/restaurant.html.twig', [
            'restaurant' => 'Notre restaurant',
        ]);
    }
    #[Route('/hotel/spa', name: 'hotel_spa')]
    public function spa(): Response
    {
        return $this->render('hotel/spa.html.twig', [
            'bien_être' => 'Présentation de notre Spa',
        ]);
    }
    #[Route('/hotel/propos', name: 'hotel_propos')]
    public function propos(): Response
    {
        return $this->render('hotel/propos.html.twig', [
            'controller_name' => 'HotelController',
        ]);
    }
    

   
}


   

