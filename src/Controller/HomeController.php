<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Twig\Environment;

class HomeController extends AbstractController
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    #[Route('/', name: 'app_home')]
    public function index(Environment $environment): Response
    {
        $categories = $this->getCategories();

        $pageTitle = "Large News";

        $html = $environment->render('home.html.twig', [
            'categories' => $categories,
            'pageTitle' => $pageTitle,
        ]);

        return new Response($html);
    }

    #[Route('/category/{slug}', name: 'app_category', methods: ['GET', 'POST'])]
    public function category(string $slug): Response
    {
        $pageTitle = ucfirst($slug);

        return $this->render('category.html.twig', [
            'pageTitle' => $pageTitle,
            'categories' => $this->getCategories(),
            'news' => $this->getNewsList(),
        ]);
    }

    private function getNewsList(): array
    {
        $url = "https://raw.githubusercontent.com/arturvas/array-news/patch-1/arrayNews.json";
        $response = $this->httpClient->request('GET', $url);
        $news = $response->toArray();

        return $news;
    }

    private function getCategories(): array
    {
        $url = "https://raw.githubusercontent.com/arturvas/array-news/main/arrayCategoryNews.json";
        $response = $this->httpClient->request('GET', $url);
        $categories = $response->toArray();

        return $categories;
    }
}
