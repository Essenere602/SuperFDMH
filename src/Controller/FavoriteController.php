<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavoriteController extends AbstractController
{
    #[Route('/favorites', name: 'app_favorites')]
    public function index(): Response
    {
        return $this->render('favorite/index.html.twig');
    }

    #[Route('/favorites/toggle', name: 'app_favorites_toggle', methods: ['POST'])]
    public function toggle(Request $request): Response
    {
        // Logic to handle favorite toggle
        // Will be implemented later with database
        // For now, redirect back to referring page
        $referer = $request->headers->get('referer');
        return $this->redirect($referer ?: $this->generateUrl('app_home'));
    }
}