<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/user', 'User::index');

$routes->get('/', 'AuthController::login'); // login
$routes->get('login', 'AuthController::login'); // Menampilkan halaman login
$routes->post('login', 'AuthController::login_action'); // Menangani proses login
$routes->get('register', 'AuthController::register'); // Menampilkan halaman registrasi
$routes->post('register', 'AuthController::register_action'); // Menangani proses registrasi
$routes->get('logout', 'AuthController::logout'); // Menangani proses logout
$routes->get('user/downloadCSV', 'User::downloadCSV');//Menangani proses download
$routes->get('user/getData', 'User::getData');


