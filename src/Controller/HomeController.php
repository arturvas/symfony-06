<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        Environment $environment,
    ): Response {

        $categories = [
            ['title' => 'World',        'text' => 'News about World'],
            ['title' => 'Brazil',       'text' => 'News about Brazil'],
            ['title' => 'Technology',   'text' => 'News about Technology'],
            ['title' => 'Design',       'text' => 'News about Design'],
            ['title' => 'Culture',      'text' => 'News about Culture'],
            ['title' => 'Business',     'text' => 'News about Business'],
            ['title' => 'Politics',     'text' => 'News about Politics'],
            ['title' => 'Opinion',      'text' => 'News about Opinion'],
            ['title' => 'Science',      'text' => 'News about Science'],
            ['title' => 'Health',       'text' => 'News about Health Care'],
            ['title' => 'Style',        'text' => 'News about Life Style'],
            ['title' => 'Travel',       'text' => 'News about Travels'],
        ];

        $pageTitle = "Large News";

        $html = $environment->render('home/index.html.twig', [
            'categories' => $categories,
            'pageTitle' => $pageTitle,
        ]);

        return new Response($html);
    }

    #[Route('/category/{slug}', name: 'app_category', methods: ['GET', 'POST'])]
    public function category(string $slug = null): Response
    {
        $categories = [
            ['title' => 'World',        'text' => 'News about World'],
            ['title' => 'Brazil',       'text' => 'News about Brazil'],
            ['title' => 'Technology',   'text' => 'News about Technology'],
            ['title' => 'Design',       'text' => 'News about Design'],
            ['title' => 'Culture',      'text' => 'News about Culture'],
            ['title' => 'Business',     'text' => 'News about Business'],
            ['title' => 'Politics',     'text' => 'News about Politics'],
            ['title' => 'Opinion',      'text' => 'News about Opinion'],
            ['title' => 'Science',      'text' => 'News about Science'],
            ['title' => 'Health',       'text' => 'News about Health Care'],
            ['title' => 'Style',        'text' => 'News about Life Style'],
            ['title' => 'Travel',       'text' => 'News about Travels'],
        ];

        $pageTitle = "News About " . $slug;

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'pageTitle' => $pageTitle,
        ]);
    }
}
