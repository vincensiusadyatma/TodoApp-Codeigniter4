<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::view_login');
$routes->post('/prosesLogin', 'AuthController::proses_login');
$routes->get('/prosesLogout', 'AuthController::proses_logout');


$routes->get('register', 'UserController::index');
$routes->post('register/tambah','UserController::tambah');

$routes->get('todolist','TodoController::index');
$routes->get('todolist/tambah','TodoController::simpanKegiatan');
$routes->get('todolist/selesai/(:segment)','TodoController::selesaiKegiatan');
$routes->get('todolist/hapus/(:segment)','TodoController::hapusKegiatan');