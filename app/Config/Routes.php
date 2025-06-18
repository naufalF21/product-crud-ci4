<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Product::index');
$routes->resource('products', ['controller' => 'Product']);
