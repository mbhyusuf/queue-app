<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/consult', 'Consult::index');
$routes->post('/consult', 'Consult::postProblem');
$routes->post('/delete/(:segment)', 'Consult::deleteProblem/$1');
$routes->post('/edit/(:segment)', 'Consult::editProblem/$1');
$routes->post('/update/(:segment)', 'Consult::updateProblem/$1');

$routes->get('/admin', 'Admin::index');
service('auth')->routes($routes);
