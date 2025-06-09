<?php

namespace App\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Plates\Engine;
use function FastRoute\simpleDispatcher;

class Router {
    private Dispatcher $dispatcher;
    private Engine $templates;
    private ApiClient $apiClient;

    public function __construct() {
        $this->templates = new Engine(dirname(__DIR__));
        $this->apiClient = new ApiClient();
        
        $this->templates->addData(['year' => date('Y')]);
        
        $this->dispatcher = simpleDispatcher(function(RouteCollector $r) {
            $r->addRoute('GET', '/', 'views/home');
            $r->addRoute('GET', '/mapa-site', 'views/sitemap');
            $r->addRoute('GET', '/sobre', 'views/about');
            $r->addRoute(['GET', 'POST'], '/contato', 'views/contact');
            $r->addRoute('GET', '/sitemap.xml', 'sitemap');
            $r->addRoute('GET', '/robots.txt', 'robots');
            $r->addRoute('GET', '/{slug}', 'views/dynamic');
        });
    }

    private function renderView(string $view, array $data = []): string {
        return $this->templates->render($view, $data);
    }

    private function generateSitemap(): string {
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        
        // Rotas estáticas
        $staticRoutes = [
            '/' => [
                'url' => $baseUrl . '/',
                'lastmod' => date('c'),
                'changefreq' => 'daily',
                'priority' => '1.0'
            ],
            '/sobre' => [
                'url' => $baseUrl . '/sobre',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            '/contato' => [
                'url' => $baseUrl . '/contato',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ],
            '/mapa-site' => [
                'url' => $baseUrl . '/mapa-site',
                'lastmod' => date('c'),
                'changefreq' => 'monthly',
                'priority' => '0.6'
            ]
        ];

        // Páginas dinâmicas da API
        $dynamicRoutes = [];
        $pages = $this->apiClient->getAllPages();
        
        if ($pages && is_array($pages)) {
            foreach ($pages as $page) {
                if (isset($page->url) || isset($page->slug)) {
                    $slug = $page->url ?? $page->slug;
                    $dynamicRoutes[$slug] = [
                        'url' => $baseUrl . '/' . ltrim($slug, '/'),
                        'lastmod' => isset($page->updated_at) ? date('c', strtotime($page->updated_at)) : date('c'),
                        'changefreq' => 'weekly',
                        'priority' => '0.9'
                    ];
                }
            }
        }

        // Combinar todas as rotas
        $allRoutes = array_merge($staticRoutes, $dynamicRoutes);

        // Gerar XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        foreach ($allRoutes as $route) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($route['url']) . "</loc>\n";
            $xml .= "    <lastmod>" . $route['lastmod'] . "</lastmod>\n";
            $xml .= "    <changefreq>" . $route['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $route['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }
        
        $xml .= '</urlset>';
        
        return $xml;
    }

    private function generateRobotsTxt(): string {
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $sitemapUrl = $baseUrl . '/sitemap.xml';
        
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";  // Exemplo de disallow, ajuste conforme necessário
        $content .= "Sitemap: " . $sitemapUrl . "\n";
        
        return $content;
    }

    public function dispatch(): void {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                header("HTTP/1.0 404 Not Found");
                echo $this->renderView('views/404');
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                header("HTTP/1.0 405 Method Not Allowed");
                echo $this->renderView('views/405');
                break;
            case Dispatcher::FOUND:
                $view = $routeInfo[1];
                $vars = $routeInfo[2];
                
                // Handle sitemap specially
                if ($view === 'sitemap') {
                    header('Content-Type: application/xml; charset=utf-8');
                    echo $this->generateSitemap();
                } else if ($view === 'robots') {
                    header('Content-Type: text/plain; charset=utf-8');
                    echo $this->generateRobotsTxt();
                } else {
                    echo $this->renderView($view, $vars);
                }
                break;
        }
    }
} 