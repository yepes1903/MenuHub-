<?php
// Rutas para el administrador

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'Home::index');

$routes->get('/resenas', 'Resenas::index');

// Rutas para el usuario
$routes->get('/registro', 'User::registro');
$routes->post('/registroGuardar', 'User::registroGuardar');
$routes->get('/login', 'User::login');
$routes->post('/loginValidar', 'User::loginValidar');
$routes->get('/logout', 'User::logout');
$routes->get('/profile/edit', 'User::editProfile');
$routes->post('user/updateProfile', 'User::updateProfile');
$routes->get('user/editProfile', 'User::editProfile');

// Rutas para el administrador

$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->post('actualizar_user', 'Admin::actualizar_user');
    $routes->post('eliminarUsuario/(:num)', 'Admin::eliminarUsuario/$1');
    $routes->post('cambiarRol/(:num)', 'Admin::cambiarRol/$1');
    $routes->get('usuarios', 'Admin::index');
  
});

  $routes->get('productos', 'Admin::productos');
  $routes->post('productos/agregar', 'Admin::agregarProducto');
  $routes->post('productos/eliminar/(:num)', 'Admin::eliminarProducto/$1');

// Ruta para el dashboard
$routes->post('productos/editar/(:num)', 'Admin::editarProducto/$1');


$routes->group('carrito', function($routes) {
    $routes->get('/', 'Carrito::index');
    $routes->post('agregar', 'Carrito::agregar');
    $routes->post('actualizar', 'Carrito::actualizar');
    $routes->get('eliminar/(:num)', 'Carrito::eliminar/$1');
    $routes->get('count', 'Carrito::contarItems');
});


$routes->get('/quemas', 'Quemas::index');
$routes->get('productos', 'Productos::index');

$routes->get('producticos', 'Productos::index');

// Otras rutas públicas
$routes->get('/instructivo', 'Home::instructivo');
$routes->get('/player', 'Home::player');

