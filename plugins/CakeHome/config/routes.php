<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'MCloudHome',
    ['path' => '/m-cloud-home'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);

        $routes->prefix('api/v1', function ($routes) {
            $routes->extensions(['json']);
            $routes->fallbacks(DashedRoute::class);
        });
    }
);
