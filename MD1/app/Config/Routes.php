<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('customers', 'Customers::index');
$routes->get('customers/new', 'Customers::newForm');
$routes->post('customers/create', 'Customers::create');
$routes->get('customers/view/(:num)', 'Customers::view/$1');
$routes->get('customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('customers/update/(:num)', 'Customers::update/$1');
$routes->post('customers/delete/(:num)', 'Customers::delete/$1');
$routes->get('users', 'Users::index');
$routes->get('users/new', 'Users::newForm');
$routes->post('users/create', 'Users::create');
$routes->get('users/view/(:num)', 'Users::view/$1');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');
$routes->post('users/delete/(:num)', 'Users::delete/$1');
