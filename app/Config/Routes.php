<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// A. AUTH
$routes->get('/', 'Auth::login'); 
$routes->get('login', 'Auth::login'); 
$routes->post('auth/prosesLogin', 'Auth::prosesLogin'); 
$routes->get('register', 'Auth::register'); 
$routes->post('auth/prosesRegister', 'Auth::prosesRegister'); 
$routes->get('logout', 'Auth::logout');

// B. GRUP ADMIN
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    // Rute lainnya untuk admin...
    $routes->get('pengguna', 'Admin::pengguna');
    $routes->get('jadwal', 'Admin::jadwal');
    $routes->get('bus', 'Admin::bus');
});

// C. GRUP PENUMPANG 
// Grup Rute Penumpang
$routes->group('penumpang', function($routes) {
    // UNTUK MENAMPILKAN HALAMAN (Wajib GET)
    $routes->get('dashboard', 'Penumpang::dashboard');
    $routes->get('jadwal', 'Penumpang::jadwal'); 
    $routes->get('riwayat', 'Penumpang::riwayat');
    $routes->get('pilih-kursi/(:num)', 'Penumpang::pilih_kursi/$1');

    // UNTUK MENGIRIM DATA FORM (Wajib POST)
    $routes->post('pesan_tiket', 'Penumpang::pesan_tiket');
});

// D. GRUP PETUGAS
$routes->group('petugas', function($routes) {
    $routes->get('dashboard', 'Petugas::dashboard');
});