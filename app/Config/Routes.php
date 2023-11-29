<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sample', 'Sample::index');

$routes->get('/sample/create', 'Sample::create');
$routes->post('/sample/store', 'Sample::store');

$routes->get('/sample/edit/(:any)', 'Sample::edit/$1');
$routes->post('/sample/update/(:any)', 'Sample::update/$1');

$routes->get('/sample/delete/(:any)', 'Sample::delete/$1');
