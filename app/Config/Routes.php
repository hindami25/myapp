<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->post('/loginAuth', 'Home::loginAuth');
$routes->get('/logout', 'Home::logout');
$routes->get('/description', 'Home::description');
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/logout', 'Home::logout');
    $routes->get('/description', 'Home::description');
});
