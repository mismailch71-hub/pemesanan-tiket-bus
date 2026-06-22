<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TransaksiModel;
use App\Models\UlasanModel;
use App\Models\PengumumanModel;
use App\Models\UserModel;

class Penumpang extends BaseController
{
    // 1. Dashboard 
    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) 
            return redirect()->to(base_url('login'));

        $transaksiModel = new TransaksiModel();
        $pengumumanModel = new PengumumanModel();
        $id_user = session()->get('id');

        $data['jumlah_tiket_aktif'] = $transaksiModel->where('id_user', $id_user)
                                                     ->where('status_pembayaran', 'Pending')
                                                     ->countAllResults();
        $data['jumlah_selesai'] = $transaksiModel->where('id_user', $id_user)
                                                 ->where('status_pembayaran', 'Lunas')
                                                 ->countAllResults();

        $data['pengumuman_list'] = $pengumumanModel->where('status', 'aktif')
                                                   ->orderBy('created_at', 'DESC')
                                                   ->findAll();

        return view('penumpang/dashboard', $data);
    }

    public function kirim_ulasan()
    {
        $ulasanModel = new UlasanModel();
        $ulasanModel->simpan([
            'id_user' => session()->get('id'),
            'isi' => $this->request->getPost('isi'),
            'rating' => $this->request->getPost('rating')
        ]);
        return redirect()->to(base_url('penumpang/dashboard'))
                         ->with('success', "ulasan berhasil dikirim!");
    }

    public function edit_profil()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('id'));
        return view('penumpang/edit_profil', $data);
    }

    public function update_profil()
    {
        $userModel = new UserModel();
        $dataUpdate = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
        ];
        if (!empty($this->request->getPost('password'))){
            $dataUpdate['password'] = $this->request->getPost('password');
        }

        $userModel->update($id, $dataUpdate);
        return redirect()->to(base_url('penumpang/dashboard'))->with('success', 'Profil berhasil diperbarui!');
    }

    //2. jadwal & Pemesanan
    public function jadwal()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url('login'));
        $jadwalModel = new JadwalModel();
        $keyword = $this->request->getGet('cari');
        $data['daftar_jadwal'] = $keyword ? $jadwalModel->like('tujuan', $keyword)
                                                        ->orlike('asal', $keyword)
                                                        ->findAll() : $jadwalModel->findAll();
        $data['keyword'] = $keyword;
        return view('penumpang/jadwal', $data);
    }

    public function pesan_tiket()
    {
        if (!session()->has('id')) return redirect()->to(base_url('login'));
        $transaksiModel = new TransaksiModel();
        $jadwal = (new JadwalModel())->find($this->request->getPost('id_jadwal'));
        $transaksiModel->insert([
            'id_user' => session()->get('id'),
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'nomor_kursi' => $this->request->getPost('nomor_kursi'),
            'total_harga' => $jadwal['harga'] ?? 0,
            'status_pembayaran' => 'Pending',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to(base_url('penumpang/riwayat'))->with('success', 'Tiket berhasil dipesan!');
    }

    public function riwayat()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to(base_url('login'));
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->select('transaksi.*, jadwal.asal, jadwal.tujuan, jadwal.jam_keberangkatan')
                                            ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                                            ->where('transaksi.id_user', session()->get('id'))
                                            ->findAll();
        return view('penumpang/riwayat', $data);
    }
}