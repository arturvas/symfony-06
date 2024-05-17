<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
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
    public function category(string $slug = null): Response
    {
        $categories = $this->getCategories();

        $pageTitle = ucfirst($slug);

        return $this->render('category.html.twig', [
            'categories' => $categories,
            'pageTitle' => $pageTitle,
            'news' => $this->getNewsList(),
        ]);
    }

    public function getNewsList()
    {
        return [
            [
                "title" => "Nova descoberta arqueológica no Egito",
                "description" => "Arqueólogos descobriram uma nova tumba faraônica com artefatos e múmias bem preservadas.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-03-15 10:00:00")
            ],
            [
                "title" => "Empresa anuncia novo produto revolucionário",
                "description" => "A empresa XYZ anunciou o lançamento de um novo produto que promete mudar o mercado.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-04-14 15:30:00")
            ],
            [
                "title" => "Novo estudo revela impactos do aquecimento global",
                "description" => "Um novo estudo mostra que o aquecimento global está causando mudanças drásticas em ecossistemas marinhos.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-05-13 09:45:00")
            ],
            [
                "title" => "Atleta brasileiro ganha medalha de ouro em competição internacional",
                "description" => "O atleta brasileiro João da Silva conquistou a medalha de ouro no campeonato mundial de atletismo.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-03-12 16:20:00")
            ],
            [
                "title" => "Novo filme de super-herói bate recorde de bilheteria",
                "description" => "O novo filme da franquia 'Super-Herói X' bateu recorde de bilheteria em sua primeira semana de exibição.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-01-11 13:10:00")
            ],
            [
                "title" => "Pesquisadores descobrem nova espécie de animal marinho",
                "description" => "Pesquisadores da Universidade de São Paulo descobriram uma nova espécie de peixe em águas profundas do oceano Atlântico.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-01-10 11:00:00")
            ],
            [
                "title" => "Grande incêndio atinge área de preservação ambiental",
                "description" => "Um grande incêndio atingiu uma área de preservação ambiental no estado do Amazonas.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime("2024-01-09 19:15:00")
            ],
            [
                "title" => "Novo parque é inaugurado na cidade",
                "description" => "A prefeitura inaugura o novo parque da cidade, com diversas atrações para todas as idades.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime('2024-02-10'),
            ],
            [
                "title" => "Acidente grave na rodovia",
                "description" => "Um acidente envolvendo três veículos deixou quatro pessoas feridas na rodovia BR-101.",
                "image" => "https://loremflickr.com/360/225",
                "created_at" => new \DateTime('2023-02-16 12:50'),
            ],
        ];
    }

    /**
     * @return array[]
     */
    public function getCategories(): array
    {
        $categories = [
            ['title' => 'world', 'text' => 'News about World'],
            ['title' => 'brazil', 'text' => 'News about Brazil'],
            ['title' => 'technology', 'text' => 'News about Technology'],
            ['title' => 'design', 'text' => 'News about Design'],
            ['title' => 'culture', 'text' => 'News about Culture'],
            ['title' => 'business', 'text' => 'News about Business'],
            ['title' => 'politics', 'text' => 'News about Politics'],
            ['title' => 'opinion', 'text' => 'News about Opinion'],
            ['title' => 'science', 'text' => 'News about Science'],
            ['title' => 'health', 'text' => 'News about Health Care'],
            ['title' => 'style', 'text' => 'News about Life Style'],
            ['title' => 'travel', 'text' => 'News about Travels'],
        ];
        return $categories;
    }
}
