<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    //1. Dashboard Petugas
    public function dashboard()
    {
        if(session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }

        $db = \Config\Database::connect();

        $data['totalBus'] = $db->table('bus')->countAllResults();
        $data['totalJadwal'] = $db->table('jadwal')->countAllResults();

        $data['totalPesanan'] = $db->table('transaksi')
                                   ->select('kode_tiket')
                                   ->distinct()
                                   ->countAllResults();

        $data['totalTiket'] = $db->table('transaksi')
                                 ->countAllResults();

        $data['totalLunas'] = $db->table('transaksi')
                                 ->where('status_pembayaran', 'Lunas')
                                 ->countAllResults();

        $data['jadwal'] = $db->table('jadwal')
                             ->select('jadwal.*, bus.kapasitas')
                             ->join('bus', 'bus.id = jadwal.id_bus', 'left')
                             ->get()
                             ->getResultArray();

        return view('petugas/dashboard', $data);
    }

    public function validasi()
    {
        if (session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }
        return view('petugas/validasi');
    }

    public function validasi_tiket()
    {
        if (session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }

        $kode_tiket = $this->request->getPost('kode_booking');
        $db = \Config\Database::connect();

        $rows = $db->table('transaksi')
                   ->select('transaksi.*, users.username, jadwal.nama_bus, jadwal.asal, jadwal.tujuan, jadwal.jam_keberangkatan')
                   ->join('users', 'users.id = transaksi.id_user')
                   ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                   ->where('transaksi.kode_tiket', $kode_tiket)
                   ->get()
                   ->getResultArray();

        if (empty($rows)) {
            return redirect()->to(base_url('petugas/validasi'))->with('error', 'Kode booking tidak ditemukan!');
        }

        if ($rows[0]['status_pembayaran'] !== 'Lunas') {
            return redirect()->to(base_url('petugas/validasi'))->with('error', 'Tiket belum lunas, penumpang belum bisa naik!');
        }

        $data['tiket'] = $rows[0];
        $data['daftar_kursi'] = array_column($rows, 'nomor_kursi');

        return view('petugas/validasi', $data);
    }

    public function jadwal()
    {
        if (session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }

        $db = \Config\Database::connect();
        $daftar_jadwal = $db->table('jadwal')
                             ->select('jadwal.*, bus.kapasitas')
                             ->join('bus', 'bus.id = jadwal.id_bus', 'left')
                             ->get()
                             ->getResultArray();

        foreach ($daftar_jadwal as &$j) {
            $j['kursi_terisi'] = $db->table('transaksi')
                                    ->where('id_jadwal', $j['id'])
                                    ->countAllResults();
            $j['kursi_sisa'] = ($j['kapasitas'] ?? 0) - $j['kursi_terisi'];
        }

        $data['jadwal'] = $daftar_jadwal;
        return view('petugas/jadwal', $data);
    }

    public function manifes($id_jadwal = null) 
    {
        if (session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }

        $db = \Config\Database::connect();
        $builder = $db->table('transaksi')
                      ->select('transaksi.id, users.username, jadwal.nama_bus, transaksi.nomor_kursi, transaksi.status_pembayaran')
                      ->join('users', 'users.id = transaksi.id_user')
                      ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                      ->where('transaksi.status_pembayaran', 'Lunas');

        if ($id_jadwal !== null) {
            $builder->where('transaksi.id_jadwal', $id_jadwal);
        }

        $data['manifes'] = $builder->get()->getResultArray();

        return view('petugas/manifes', $data);
    }

    public function laporan()
    {
        if (session()->get('role') !== 'petugas') {
            return redirect()->to(base_url('login'));
        }

        $db = \Config\Database::connect();
        $data['totalBus'] = $db->table('bus')->countAllResults();
        $data['totalJadwal'] = $db->table('jadwal')->countAllResults();
        $data['totalPesanan'] = $db->table('transaksi')
                                  ->select('kode_tiket')
                                  ->distinct()
                                  ->countAllResults();
        $data['totalTiket'] = $db->table('transaksi')->countAllResults();

        $data['totalLunas'] = $db->table('transaksi')
                                 ->where('status_pembayaran', 'Lunas')
                                 ->countAllResults();

        $data['totalPending'] = $db->table('transaksi')
                                   ->where('status_pembayaran', 'Pending')
                                   ->countAllResults();

        $data['totalPendapatan'] = $db->table('transaksi')
                                      ->selectSum('total_harga')
                                      ->where('status_pembayaran', 'Lunas')
                                      ->get()
                                      ->getRow()
                                      ->total_harga ?? 0;
        
        return view('petugas/laporan', $data);
    }
}