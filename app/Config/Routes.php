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
$routes->post('/solution/(:segment)', 'SolutionController::getSolution/$1');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/user-management', 'Admin::getUsers');
$routes->post('/admin/user/delete/(:segment)', 'Admin::deleteUser/$1');
$routes->post('/admin/user/(:segment)', 'Admin::userDetail/$1');
$routes->post('/admin/solution/(:segment)', 'SolutionController::postSolution/$1');
$routes->post('/admin/(:segment)', 'SolutionController::index/$1');
service('auth')->routes($routes);
