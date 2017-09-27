<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeAuth',
    ['path' => '/cake-auth'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);

        $routes->prefix('admin', function ($routes) {
            $routes->fallbacks(DashedRoute::class);
        });

        $routes->prefix('settings', function ($routes) {
            $routes->fallbacks(DashedRoute::class);
        });

        $routes->prefix('api/v1', function ($routes) {
            $routes->extensions(['json']);
            $routes->fallbacks(DashedRoute::class);
        });
    }
);


Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/users/index', ['plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index']);
    $routes->connect('/users/login', ['plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'login']);
    $routes->connect('/users/logout', ['plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'logout']);
});