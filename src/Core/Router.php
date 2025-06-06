<?php

namespace App\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Plates\Engine;
use function FastRoute\simpleDispatcher;

class Router {
    private Dispatcher $dispatcher;
    private Engine $templates;

    public function __construct() {
        $this->templates = new Engine(dirname(__DIR__));
        
        $this->templates->addData(['year' => date('Y')]);
        
        $this->dispatcher = simpleDispatcher(function(RouteCollector $r) {
            $r->addRoute('GET', '/', 'views/home');
            $r->addRoute('GET', '/mapa-site', 'views/sitemap');
            $r->addRoute('GET', '/sobre', 'views/about');
            $r->addRoute(['GET', 'POST'], '/contato', 'views/contact');
            $r->addRoute('GET', '/{slug}', 'views/dynamic');
        });
    }

    private function renderView(string $view, array $data = []): string {
        return $this->templates->render($view, $data);
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
                echo $this->renderView($view, $vars);
                break;
        }
    }
} 