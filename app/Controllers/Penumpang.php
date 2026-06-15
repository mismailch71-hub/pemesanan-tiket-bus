<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TransaksiModel;

class Penumpang extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            header('Location: ' . base_url('login'));
            exit();
        }
    }
    // --- 1. Dashboard ---
    public function dashboard()
    {
        return view('penumpang/dashboard');
    }

    // --- 2. Menu Jadwal & Pemesanan (Digabung) ---
    public function jadwal()
    {
        $jadwalModel = new JadwalModel();
        $keyword = $this->request->getGet('cari');
        
        $data['daftar_jadwal'] = $keyword ? 
            $jadwalModel->like('tujuan', $keyword)->orLike('asal', $keyword)->findAll() : 
            $jadwalModel->findAll();
            
        $data['keyword'] = $keyword;
        return view('penumpang/jadwal', $data);
    }

    public function pilih_kursi($id_jadwal)
    {
        $data['jadwal'] = (new JadwalModel())->find($id_jadwal);
        return view('penumpang/pilih_kursi', $data);
    }

    public function pesan_tiket()
    {
    // Debug: Cek apakah ID user ada
    if (!session()->has('id')) {
        die("Error: Session ID kosong! Anda mungkin belum login.");
    }

    $transaksiModel = new TransaksiModel();
    $data = [
        'id_user'     => session()->get('id'),
        'id_jadwal'   => $this->request->getPost('id_jadwal'),
        'nomor_kursi' => $this->request->getPost('nomor_kursi'),
        'status_pembayaran' => 'Pending'
    ];
    
    $transaksiModel->insert($data);
    return redirect()->to(base_url('penumpang/riwayat'))->with('success', 'Tiket berhasil dipesan!');
    }

    // --- 3. Menu Riwayat & Tiket (Digabung) ---
    public function riwayat()
    {
        $transaksiModel = new \App\Models\TransaksiModel();
        $data['transaksi'] = $transaksiModel->where('id_user', session()->get('id'))->findAll();
        return view('penumpang/riwayat', $data);
    }

    public function tiket_digital($id_transaksi)
    {
        $transaksiModel = new TransaksiModel();
        $data['tiket'] = $transaksiModel->find($id_transaksi);
        return view('penumpang/tiket_digital', $data);
    }
}