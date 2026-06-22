<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    // Rooms & RoomTypes
    $routes->get('rooms', 'Rooms::index');
    $routes->post('rooms/store', 'Rooms::store');
    $routes->post('rooms/update/(:num)', 'Rooms::update/$1');
    $routes->get('rooms/delete/(:num)', 'Rooms::delete/$1');
    
    $routes->post('rooms/storeType', 'Rooms::storeType');
    $routes->post('rooms/updateType/(:num)', 'Rooms::updateType/$1');
    $routes->get('rooms/deleteType/(:num)', 'Rooms::deleteType/$1');
    
    // Guests
    $routes->get('guests', 'Guests::index');
    $routes->post('guests/store', 'Guests::store');
    $routes->post('guests/update/(:num)', 'Guests::update/$1');
    $routes->get('guests/delete/(:num)', 'Guests::delete/$1');
    
    // Services
    $routes->get('services', 'Services::index');
    $routes->post('services/store', 'Services::store');
    $routes->post('services/update/(:num)', 'Services::update/$1');
    $routes->get('services/delete/(:num)', 'Services::delete/$1');
    
    // Transactions
    $routes->get('transactions', 'Transactions::index');
    $routes->get('transactions/create', 'Transactions::create');
    $routes->post('transactions/store', 'Transactions::store');
    $routes->get('transactions/show/(:num)', 'Transactions::show/$1');
    $routes->get('transactions/print/(:num)', 'Transactions::printInvoice/$1');
    $routes->post('transactions/addService/(:num)', 'Transactions::addService/$1');
    $routes->get('transactions/deleteService/(:num)/(:num)', 'Transactions::deleteService/$1/$2');
    $routes->post('transactions/checkout/(:num)', 'Transactions::checkout/$1');
});
