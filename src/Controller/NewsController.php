<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('api/news/{id}', name: 'api_new', methods: ['GET'])]
    public function getNew(int $id = null): Response
    {
        //        dd('API Route ' . $id);
        // TODO - make a real query

        $new = [
            "id" => $id,
            "title" => "Artur de Castro de Vasconcelos casa-se com Sara Albuquerque",
            "category" => "Casamento",
            "description" => "Depois de muito se conhecerem, ideias alinhadas, ele decide pedir-a em casamento. E ela aceita, muito emocionada.",
            "date" => "2026-08-25",
            "image" => "https://exemple.com/image/wedding.jpeg"
        ];
        return new JsonResponse($new, Response::HTTP_OK);
    }
}
