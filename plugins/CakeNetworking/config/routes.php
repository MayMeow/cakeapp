<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeNetworking',
    ['path' => '/cake-networking'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/static/:id/**', ['plugin' => 'CakeNetworking', 'controller' => 'ContentDeliveryNetworks', 'action' => 'delivery']);
});
