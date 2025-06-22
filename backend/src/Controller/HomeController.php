<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RouterInterface $router): Response
    {
        // Alle API-Routen extrahieren
        $routes = [];
        foreach ($router->getRouteCollection() as $name => $route) {
            if (str_starts_with($route->getPath(), '/api')) {
                $routes[] = [
                    'name' => $name,
                    'path' => $route->getPath(),
                    'methods' => $route->getMethods(),
                ];
            }
        }

        return $this->render('home/index.html.twig', [
            'api_routes' => $routes,
            'user' => $this->getUser(), // Wenn du eingeloggt bist
        ]);
    }
}
