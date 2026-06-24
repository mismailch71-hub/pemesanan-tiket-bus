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

    $data['jadwal'] = $db->table('jadwal')
        ->join('bus', 'bus.id = jadwal.id')
        ->get()
        ->getResultArray();

    return view('petugas/dashboard', $data);
    }
    public function validasi()
    {
        return view('petugas/validasi');
    }
    public function jadwal()
    {
        $db = \Config\Database::connect();
        $data['jadwal'] =
        $db->table('jadwal')
           ->get()
           ->getResultArray();
        return view('petugas/jadwal', $data);
    }
   public function manifes()
{
    $db = \Config\Database::connect();
    $data['manifes'] = $db->table('pemesanan_tiket pt')
        ->select('
            pt.id,
            u.username,
            b.nama_bus,
            pt.nomor_kursi,
            pt.status_pembayaran
        ')
        ->join('users u', 'u.id = pt.id_user')
        ->join('jadwal j', 'j.id = pt.id_jadwal')
        ->join('bus b', 'b.id = j.id')
        ->get()
        ->getResultArray();

    return view('petugas/manifes', $data);
}
    public function laporan()
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
        return view('petugas/laporan', $data);
    }
}