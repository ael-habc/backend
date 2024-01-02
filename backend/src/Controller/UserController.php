<?php
// src/Controller/UserController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/api/user/register", name="user_register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        // Your registration logic here

        return $this->json(['success' => true, 'message' => 'User registered successfully']);
    }

    /**
     * @Route("/api/user/login", name="user_login", methods={"POST"})
     */
    public function login(Request $request): JsonResponse
    {
        // Your login logic here

        return $this->json(['success' => true, 'message' => 'Login successful', 'user_id' => 123]);
    }
}
