<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/makanan', 'Home::makanan');
$routes->get('/minuman', 'Home::minuman');
$routes->get('/promo', 'Home::promo');
$routes->get('/menu_baru', 'Home::menu_baru');
$routes->get('/paket', 'Home::paket');
// File: app/Config/Routes.php
$routes->get('/keranjang/kurang', 'KeranjangController::kurang');
$routes->get('/keranjang/tambah', 'KeranjangController::tambah');
$routes->get('keranjang/hapus', 'KeranjangController::hapus');

$routes->get('/pesan', 'PesanController');
$routes->post('/pesan', 'PesanController::pesan');


$routes->get('login', 'Admin\AuthController::login', ['filter' => 'guest']);
$routes->post('login', 'Admin\AuthController::login', ['filter' => 'guest']);
$routes->get('logout', 'Admin\AuthController::logout', ['filter' => 'auth']);

$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController');
    $routes->get('produk', 'Admin\ProdukController::index');
    $routes->get('produk/(:segment)', 'Admin\ProdukController::filter/$1');
    $routes->post('produk', 'Admin\ProdukController::create');
    $routes->get('produk/hapus/(:segment)', 'Admin\ProdukController::hapus/$1');
    $routes->post('produk/update/(:segment)', 'Admin\ProdukController::update/$1');
    $routes->get('pesanan', 'Admin\PesananController::index');
    $routes->get('pesanan/sukses/(:segment)', 'Admin\PesananController::sukses/$1');
});
// $routes->post('produk', 'Admin\ProdukController::create');
