<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeLogs',
    ['path' => '/cake-logs'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);

        $routes->prefix('api', function ($routes) {
            $routes->extensions(['json']);
            $routes->fallbacks(DashedRoute::class);
        });
    }
);
