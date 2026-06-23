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
    $routes->get('pengguna', 'Admin::pengguna');
    $routes->get('pengguna/tambah', 'Admin::tambah_pengguna');  
    $routes->post('pengguna/simpan', 'Admin::simpan_pengguna'); 
    $routes->get('pengguna/edit/(:num)', 'Admin::edit_pengguna/$1');
    $routes->post('pengguna/update/(:num)', 'Admin::update_pengguna/$1');
    $routes->get('pengguna/hapus/(:num)', 'Admin::hapus_pengguna/$1');
    $routes->get('jadwal', 'Admin::jadwal');
    $routes->get('jadwal/tambah', 'Admin::tambah_jadwal');  
    $routes->post('jadwal/simpan', 'Admin::simpan_jadwal'); 
    $routes->get('jadwal/edit/(:num)', 'Admin::edit_jadwal/$1');
    $routes->post('jadwal/update/(:num)', 'Admin::update_jadwal/$1');
    $routes->get('jadwal/hapus/(:num)', 'Admin::hapus_jadwal/$1');
    $routes->get('bus', 'Admin::bus');
    $routes->get('bus/tambah', 'Admin::tambah_bus');  
    $routes->post('bus/simpan', 'Admin::simpan_bus'); 
    $routes->get('bus/edit/(:num)', 'Admin::edit_bus/$1');
    $routes->post('bus/update/(:num)', 'Admin::update_bus/$1');
    $routes->get('bus/hapus/(:num)', 'Admin::hapus_bus/$1');
    $routes->get('pengumuman', 'Admin::pengumuman');
    $routes->post('simpan_pengumuman', 'Admin::simpan_pengumuman');
    $routes->post('update_pengumuman/(:num)', 'Admin::update_pengumuman/$1');
    $routes->get('hapus_pengumuman/(:num)', 'Admin::hapus_pengumuman/$1');
    $routes->get('keuangan', 'Admin::keuangan');
    $routes->get('ulasan', 'Admin::ulasan');
    $routes->get('ulasan/hapus/(:num)', 'Admin::hapus_ulasan/$1');
    $routes->get('transaksi', 'Admin::transaksi');
    $routes->get('transaksi/konfirmasi/(:num)', 'Admin::update_status_keuangan/$1');
});

// C. GRUP PENUMPANG 
$routes->group('penumpang', function($routes) {
    $routes->get('dashboard', 'Penumpang::dashboard');
    $routes->get('edit_profil', 'Penumpang::edit_profil');
    $routes->post('update_profil', 'Penumpang::update_profil');
    $routes->get('pilih-kursi/(:num)', 'Penumpang::pilih_kursi/$1');
    $routes->get('jadwal', 'Penumpang::jadwal'); 
    $routes->get('riwayat', 'Penumpang::riwayat');
    $routes->post('pesan_tiket', 'Penumpang::pesan_tiket');  
    $routes->post('kirim_ulasan', 'Penumpang::kirim_ulasan');
});

// D. GRUP PETUGAS
$routes->group('petugas', function($routes) {
    $routes->get('dashboard', 'Petugas::dashboard');
});