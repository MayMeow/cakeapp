<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('Bootstrap',
    ['path' => '/cake-bootstrap'],
    function ($routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
