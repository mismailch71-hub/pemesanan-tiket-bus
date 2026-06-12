<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function dashboard()
    {
        // Proteksi Halaman: Pastikan yang masuk adalah Petugas
        if (session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }

        echo view('layout/header');
        echo view('petugas/dashboard'); // Memanggil halaman utama petugas
        echo view('layout/footer');
    }
}