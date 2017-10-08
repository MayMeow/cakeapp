<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeResource',
    ['path' => '/cake-resource'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/projects',
        ['plugin' => 'CakeResource', 'controller' => 'Projects', 'action' => 'index']
    );
    $routes->connect('/projects/:slug/',
        ['plugin' => 'CakeResource', 'controller' => 'Projects', 'action' => 'view'],
        ['pass' => ['slug']]
    );
    $routes->connect('/projects/:slug/:section',
        ['plugin' => 'CakeResource', 'controller' => 'Projects', 'action' => 'view'],
        ['pass' => ['slug']]
    );
});
