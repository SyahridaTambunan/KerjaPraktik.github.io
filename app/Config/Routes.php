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
$routes->get('inventaris/edit/(:num)', 'Inventaris::edit/$1');
$routes->post('inventaris/inventaris_update/(:num)', 'Inventaris::inventaris_update/$1');


$routes->get('inventaris/delete/(:segment)', 'inventaris::delete/$1');
<<<<<<< HEAD

//location
$routes->get('location/create', 'Location::create');
$routes->post('location/location_store', 'Location::location_store');
$routes->post('location/delete', 'Location::delete');
=======
$routes->get('inventaris/edit/(:num)', 'Inventaris::edit/$1');
$routes->post('inventaris/update/(:num)', 'Inventaris::update/$1');
$routes->get('location/delete/(:num)', 'Location::delete/$1');
>>>>>>> f0739b35dbdaa6d4faa7fa21a683f14dbc1d5754
