<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        return $this->render('auth/register.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function login(Request $request): Response
    {
        return $this->render('auth/login.html.twig');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Handled by Symfony Security
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}