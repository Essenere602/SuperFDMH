<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    #[Route('/listings/add', name: 'app_listing_add')]
    public function add(Request $request): Response
    {
        return $this->render('listing/add.html.twig');
    }

    #[Route('/listings/{id}/edit', name: 'app_listing_edit', requirements: ['id' => '\d+'])]
    public function edit(int $id, Request $request): Response
    {
        return $this->render('listing/edit.html.twig');
    }

    #[Route('/listings/{id}/delete', name: 'app_listing_delete', requirements: ['id' => '\d+'])]
    public function delete(int $id, Request $request): Response
    {
        return $this->render('listing/delete.html.twig');
    }

    #[Route('/houses', name: 'app_houses')]
    public function houses(Request $request): Response
    {
        $page = max(1, (int) $request->query->get('p', 1));
       
        return $this->render('listing/houses.html.twig', [
            'current_page' => $page,
        ]);
    }

    #[Route('/apartments', name: 'app_apartments')]
    public function apartments(Request $request): Response
    {
        $page = max(1, (int) $request->query->get('p', 1));
       
        return $this->render('listing/apartments.html.twig', [
            'current_page' => $page,
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(Request $request): Response
    {
        $page = max(1, (int) $request->query->get('p', 1));
        $city = trim($request->query->get('city', ''));
        $maxPrice = $request->query->get('max_price');
        $propertyType = $request->query->get('property_type');
        $transactionType = $request->query->get('transaction_type');
       
        return $this->render('listing/search.html.twig', [
            'current_page' => $page,
            'search_city' => $city,
            'search_max_price' => $maxPrice,
            'search_property_type' => $propertyType,
            'search_transaction_type' => $transactionType,
        ]);
    }
}