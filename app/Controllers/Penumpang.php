<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TransaksiModel;

class Penumpang extends BaseController
{
    // --- 1. Dashboard ---
    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $transaksiModel = new TransaksiModel();
        $id_user = session()->get('id');

        // Ambil tiket
        $data['tiket_user'] = $transaksiModel->select('transaksi.*, jadwal.asal, jadwal.tujuan, jadwal.jam_keberangkatan')
                                             ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                                             ->where('transaksi.id_user', $id_user)
                                             ->findAll();

        // Hitung statistik
        $data['jumlah_tiket_aktif'] = $transaksiModel->where('id_user', $id_user)
                                                     ->where('status_pembayaran', 'Pending')
                                                     ->countAllResults();

        $data['jumlah_selesai'] = $transaksiModel->where('id_user', $id_user)
                                                 ->where('status_pembayaran', 'Lunas')
                                                 ->countAllResults();

        return view('penumpang/dashboard', $data);
    }

    // --- 2. Jadwal & Pemesanan ---
    public function jadwal()
    {
        if (!session()->get('isLoggedIn')) 
            return redirect()->to(base_url('login'));

        $jadwalModel = new JadwalModel();
        $keyword = $this->request->getGet('cari');
        
        $data['daftar_jadwal'] = $keyword ? 
            $jadwalModel->like('tujuan', $keyword)->orLike('asal', $keyword)->findAll() : 
            $jadwalModel->findAll();
            
        $data['keyword'] = $keyword;
        return view('penumpang/jadwal', $data);
    }

    public function pesan_tiket()
    {
        if (!session()->has('id')) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        $transaksiModel = new TransaksiModel();
        $jadwalModel = new JadwalModel();
        $jadwal = $jadwalModel->find($this->request->getPost('id_jadwal'));

        $data = [
            'id_user'           => session()->get('id'),
            'id_jadwal'         => $this->request->getPost('id_jadwal'),
            'nomor_kursi'       => $this->request->getPost('nomor_kursi'),
            'total_harga'       => $jadwal['harga'] ?? 0, 
            'status_pembayaran' => 'Pending',
            'created_at'        => date('Y-m-d H:i:s')
        ];
        
        $transaksiModel->insert($data);
        return redirect()->to(base_url('penumpang/riwayat'))->with('success', 'Tiket berhasil dipesan!');
    }

    // --- 3. Riwayat ---
    public function riwayat()
    {
        if (!session()->get('isLoggedIn')) 
            return redirect()->to(base_url('login'));

        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->select('transaksi.*, jadwal.asal, jadwal.tujuan, jadwal.jam_keberangkatan')
                                            ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                                            ->where('transaksi.id_user', session()->get('id'))
                                            ->findAll();
        
        return view('penumpang/riwayat', $data);
    }
}