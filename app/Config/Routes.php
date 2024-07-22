<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Dashboard::index');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->post('/Login/authenticate', 'Login::authenticate');

$routes->get('/register', 'RegisterController::index');
$routes->post('/registercontroller/store', 'RegisterController::store');

$routes->get('items', 'ItemController::index');
$routes->get('item/edit/(:segment)', 'ItemController::edit/$1');
$routes->post('inventaris/update', 'inventaris::update');
$routes->get('inventaris/delete/(:segment)', 'inventaris::delete/$1');
$routes->get('inventaris/edit/(:num)', 'Inventaris::edit/$1');
$routes->post('inventaris/update/(:num)', 'Inventaris::update/$1');
$routes->get('location/delete/(:num)', 'Location::delete/$1');
