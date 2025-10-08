<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Dashboard routes
$routes->get('/admin', 'Admin::index');
$routes->get('/petugas', 'Petugas\Dashboard::index');



// tambah admin
$routes->get('/admin/create', 'Admin::create');
$routes->post('/admin/store', 'Admin::store');

// kelola petugas
$routes->get('admin/petugas', 'AdminPetugas::index');
$routes->get('admin/petugas/create', 'AdminPetugas::create');
$routes->post('admin/petugas/store', 'AdminPetugas::store');
$routes->get('admin/petugas/edit/(:num)', 'AdminPetugas::edit/$1');
$routes->post('admin/petugas/update/(:num)', 'AdminPetugas::update/$1');
$routes->get('admin/petugas/delete/(:num)', 'AdminPetugas::delete/$1');
// lihat buku admin
$routes->get('admin/buku', 'AdminBuku::index');
// peminjaman admin
$routes->get('admin/peminjaman', 'AdminPeminjaman::index');
// cetak laporan
// $routes->get('admin/laporan', 'AdminLaporan::index');
// $routes->post('admin/laporan/cetak', 'AdminLaporan::cetak');

// petugas input buku
$routes->group('petugas', function($routes) {
    $routes->get('buku', 'Petugas\Buku::index');
    $routes->get('buku/create', 'Petugas\Buku::create');
    $routes->post('buku/store', 'Petugas\Buku::store');
    $routes->get('buku/edit/(:num)', 'Petugas\Buku::edit/$1');
    $routes->post('buku/update/(:num)', 'Petugas\Buku::update/$1');
    $routes->get('buku/delete/(:num)', 'Petugas\Buku::delete/$1');
});

// kelola anggota 
$routes->group('petugas/anggota', ['namespace' => 'App\Controllers\Petugas'], function($routes) {
    $routes->get('/', 'AnggotaController::index');
    $routes->get('create', 'AnggotaController::create');
    $routes->post('store', 'AnggotaController::store');
    $routes->get('edit/(:num)', 'AnggotaController::edit/$1');
    $routes->post('update/(:num)', 'AnggotaController::update/$1');
    $routes->get('delete/(:num)', 'AnggotaController::delete/$1');
});
// TANPA authPetugas
$routes->get('petugas/peminjaman', 'Petugas\Peminjaman::index');
$routes->get('petugas/peminjaman/tambah', 'Petugas\Peminjaman::tambah');
$routes->post('petugas/peminjaman/simpan', 'Petugas\Peminjaman::simpan');
$routes->get('petugas/peminjaman/selesai/(:num)', 'Petugas\Peminjaman::selesai/$1');

$routes->get('petugas/laporan', 'Petugas\Laporan::index');
$routes->post('petugas/laporan/cetak', 'Petugas\Laporan::cetak');

$routes->group('admin', function($routes) {
    $routes->get('laporan', 'Admin\Laporan::index');         // Tampil form laporan
    $routes->post('laporan/cetak', 'Admin\Laporan::cetak');  // Proses cetak laporan
});

// // petugas dashboard
// $routes->get('petugas/dashboard', 'Petugas::dashboard');


$routes->get('/petugas/dashboard', 'Petugas\Dashboard::index');

