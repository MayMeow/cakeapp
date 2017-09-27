<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CakeStorage',
    ['path' => '/cake-storage'],
    function (RouteBuilder $routes) {
        //$routes->extensions(['json', 'xml']);
        $routes->fallbacks(DashedRoute::class);

        $routes->prefix('api', function ($routes) {
            $routes->extensions(['json']);
            $routes->fallbacks(DashedRoute::class);
        });
    }
);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/storage/bucket/blob/:id/**',
        ['plugin' => 'CakeStorage', 'controller' => 'Buckets', 'action' => 'blob'],
        ['id' => '\d+', 'pass' => ['id']]
    );
    $routes->connect('/git/:namespace/:slug',
        ['plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'view'],
        ['pass' => ['namespace', 'slug']]
    );
    $routes->connect('/git/:namespace/:slug/:section/**',
        ['plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'view'],
        ['pass' => ['namespace', 'slug', 'section']]
    );

    $routes->connect('/git/explore',
        ['plugin' => 'CakeStorage', 'controller' => 'GitRepositories', 'action' => 'index']
    );
});
