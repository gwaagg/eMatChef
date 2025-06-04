<?php

// src/Controller/ItemController.php
namespace App\Controller;

use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ItemController extends AbstractController
{
    #[Route('/api/items', name: 'get_items', methods: ['GET'])]
    public function getItems(EntityManagerInterface $em): JsonResponse
    {
        $items = $em->getRepository(Item::class)->findAll();
        $data = array_map(fn($item) => [
            'id' => $item->getId(),
            'name' => $item->getName(),
            'price' => $item->getPrice(),
        ], $items);

        return $this->json($data);
    }

    #[Route('/api/items', name: 'add_item', methods: ['POST'])]
    public function addItem(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $item = new Item();
        $item->setName($data['name']);

        $em->persist($item);
        $em->flush();

        return $this->json(['message' => 'Item created'], 201);
    }
}

