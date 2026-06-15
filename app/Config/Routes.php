<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. HALAMAN AUTENTIKASI (LOGIN, REGISTER, LOGOUT)
$routes->get('/', 'Auth::login'); 

// Jalur Login
$routes->get('login', 'Auth::login'); 
$routes->post('auth/prosesLogin', 'Auth::prosesLogin'); 

// Jalur Register
$routes->get('register', 'Auth::register');             
$routes->post('auth/prosesRegister', 'Auth::prosesRegister'); 

$routes->get('logout', 'Auth::logout');


// 2. HALAMAN ALUR PEMESANAN & DASHBOARD (SISI PENUMPANG / PELANGGAN)
$routes->get('jadwal', 'Pemesanan::jadwal');    
$routes->get('pilih-kursi/(:num)', 'Pemesanan::pilihKursi/$1'); 
$routes->post('transaksi/simpan', 'Pemesanan::simpanTransaksi');
$routes->get('riwayat', 'Pemesanan::riwayat');


// 3. GRUP RUTE KHUSUS ADMIN (SISI ADMIN)
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard'); 
    $routes->get('pengguna', 'Admin::pengguna');
    $routes->get('bus', 'Admin::bus');             // <--- PASTIKAN INI ADA
    $routes->get('jadwal', 'Admin::jadwal');
    $routes->get('keuangan', 'Admin::keuangan');   // <--- PASTIKAN INI JUGA ADA
    $routes->get('ulasan', 'Admin::ulasan');       // <--- PASTIKAN INI JUGA ADA

    // 1. Tampilan utama tabel user
    $routes->get('pengguna', 'Admin::pengguna');

    // 2. Form Tambah & Proses Simpan Akun baru
    $routes->get('pengguna/tambah','Admin::tambah_pengguna');
    $routes->post('pengguna/simpan', 'Admin::simpan_pengguna');

    // 3. Form Edit & Proses Perbarui Akun
    $routes->get('pengguna/edit/(:num)','Admin::edit_pengguna/$1');
    $routes->post('pengguna/update/(:num)', 'Admin::update_pengguna/$1');

    $routes->get('pengguna/hapus/(:num)', 'Admin::hapus_pengguna/$1');
    
    // Kelola Jadwal Bus oleh Admin
    $routes->get('jadwal', 'Admin::jadwal');
    $routes->get('jadwal/tambah', 'Admin::tambah_jadwal');
    $routes->post('jadwal/simpan', 'Admin::simpan_jadwal');
    $routes->get('jadwal/edit/(:num)', 'Admin::edit_jadwal/$1');
    $routes->post('jadwal/update/(:num)', 'Admin::update_jadwal/$1');
    $routes->get('jadwal/hapus/(:num)', 'Admin::hapus_jadwal/$1');

    $routes->get('bus', 'Admin::bus');
    $routes->get('bus/tambah', 'Admin::tambah_bus'); // Form tambah
    $routes->post('bus/simpan', 'Admin::simpan_bus'); // Proses simpan
    $routes->get('bus/edit/(:num)', 'Admin::edit_bus/$1'); // Form edit
    $routes->post('bus/update/(:num)', 'Admin::update_bus/$1'); // Proses update
    $routes->get('bus/hapus/(:num)', 'Admin::hapus_bus/$1'); // Proses hapus
});

$routes->get('penumpang/dashboard', 'Penumpang::dashboard');
$routes->get('jadwal', 'Penumpang::jadwal');
$routes->get('penumpang/riwayat', 'Penumpang::riwayat');
$routes->get('pilih-kursi/(:num)', 'Penumpang::pilih_kursi/$1');
$routes->post('penumpang/pesan_tiket', 'Penumpang::pesan_tiket');




// 4. 🔥 TAMBAHAN: GRUP RUTE OPERASIONAL (SISI PETUGAS TERMINAL) 🔥
$routes->group('petugas', function($routes) {
    // Dashboard Utama Petugas (Tempat Scan / Input Tiket)
    $routes->get('dashboard', 'Petugas::dashboard'); 
    
    // Validasi Tiket / Check-In Penumpang
    $routes->post('validasi-tiket', 'Petugas::validasiTiket');
});