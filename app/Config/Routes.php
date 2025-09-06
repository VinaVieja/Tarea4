<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/recursos', 'RecursoController::index');
$routes->get('/recursos/create', 'RecursoController::create');
$routes->post('/recursos/store', 'RecursoController::store');
$routes->get('/recursos/edit/(:num)', 'RecursoController::edit/$1');
$routes->post('/recursos/update/(:num)', 'RecursoController::update/$1');
$routes->get('/recursos/search', 'RecursoController::search');
$routes->get('/categorias', 'CategoriaController::index');

