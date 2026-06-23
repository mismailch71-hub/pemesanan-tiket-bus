<?php

namespace App\Controllers;
use App\Controllers\BaseController;
class Petugas extends BaseController
{
    public function dashboard()
    {
        $db = \Config\Database::connect();
        $data['totalBus'] =
            $db->table('bus')->countAllResults();
        $data['totalJadwal'] =
            $db->table('jadwal')->countAllResults();
        $data['totalPesanan'] =
            $db->table('pemesanan')->countAllResults();
        $data['totalTiket'] =
            $db->table('pemesanan_tiket')->countAllResults();
        $data['totalLunas'] =
            $db->table('pemesanan_tiket')
                ->where('status_pembayaran', 'Lunas')
                ->countAllResults();
        return view('petugas/dashboard', $data);
    }
    public function validasi()
    {
        return view('petugas/validasi');
    }
    public function jadwal()
    {
        return view('petugas/jadwal');
    }
    public function manifes()
    {
        return view('petugas/manifes');
    }
    public function laporan()
    {
        return view('petugas/laporan');
    }
}