<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'MCloudResources',
    ['path' => '/m-cloud-resources'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/groups',
        ['plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'index']
    );
    $routes->connect('/groups/:slug/',
        ['plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'view'],
        ['pass' => ['slug']]
    );
    $routes->connect('/groups/:slug/:section',
        ['plugin' => 'MCloudResources', 'controller' => 'ResourceGroups', 'action' => 'view'],
        ['pass' => ['slug']]
    );
});
