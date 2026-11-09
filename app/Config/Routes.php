<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Iphone::index');
$routes->get('iPhone-18-pro', 'Iphone::index');
$routes->get('iphone-18-pro', 'Iphone::index');
$routes->get('iphone', 'Iphone::index');

