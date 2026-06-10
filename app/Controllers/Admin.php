<?php

namespace App\Controllers;

use App\Models\TiketModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $tiketModel = new TiketModel();

        $data['semua_transaksi'] = $tiketModel->select('pemesanan_tiket.*, users.username, jadwal.nama_bus')
                                              ->join('users', 'users.id = pemesanan_tiket.id_user')
                                              ->join('jadwal', 'jadwal.id = pemesanan_tiket.id_jadwal')
                                              ->findAll();
                    
        return view('layout/header') . view('admin/dashboard', $data) . view('layout/footer');
    }
}