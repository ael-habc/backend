<?php

// src/Controller/ProductController.php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/api/products", name="get_products", methods={"GET"})
     */
    public function getProducts()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'stock' => $product->getStock(),
                'volume' => $product->getVolume(),
                // Add more fields as needed
            ];
        }

        return $this->json($data);
    }

    /**
     * @Route("/api/product/{id}", name="get_product", methods={"GET"})
     */
    public function getProduct($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json(['error' => 'Product not found'], 404);
        }

        $data = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'stock' => $product->getStock(),
            'volume' => $product->getVolume(),
            // Add more fields as needed
        ];

        return $this->json($data);
    }

    /**
     * @Route("/api/product", name="add_product", methods={"POST"})
     */
    public function addProduct(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $product = new Product();
        $product->setName($data['name']);
        $product->setDescription($data['description']);
        $product->setStock($data['stock']);
        $product->setVolume($data['volume']);
        // Set other fields as needed

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->json(['message' => 'Product added successfully']);
    }

    /**
     * @Route("/api/product/{id}", name="delete_product", methods={"DELETE"})
     */
    public function deleteProduct($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json(['error' => 'Product not found'], 404);
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->json(['message' => 'Product deleted successfully']);
    }

// Additional methods for updating and modifying products can be added here
}