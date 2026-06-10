<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Halaman Publik (User Biasa - Tidak Perlu Login)
$routes->get('/', 'Pemesanan::index');          // UI 1: Halaman Beranda Utama
$routes->get('jadwal', 'Pemesanan::jadwal');    // UI 4: Jadwal + Fitur Pencarian Rute

// 2. Halaman Alur Pemesanan & Riwayat (Akses Penumpang)
$routes->get('pilih-kursi/(:num)', 'Pemesanan::pilihKursi/$1'); // UI 3: Denah Kursi Bus
$routes->post('transaksi/simpan', 'Pemesanan::simpanTransaksi');
$routes->get('riwayat', 'Pemesanan::riwayat');                  // UI 6: Riwayat Tiket

// 3. Halaman Autentikasi (Fitur Login & Register)
$routes->get('login', 'Auth::login');           // UI 2: Form Login
$routes->post('login/proses', 'Auth::prosesLogin');
$routes->get('register', 'Auth::register');     // UI 5: Form Daftar Akun
$routes->get('logout', 'Auth::logout');

// 4. Halaman Khusus Manajemen Administrator (Perlu Login)
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard'); // UI 7: Rekap Data Manifes
});