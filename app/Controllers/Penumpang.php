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
        $ulasanModel = new \App\Models\UlasanModel();
        $data = [
            'username' => session()->get('username'),
            'bintang' => $this->request->getPost('rating'),
            'komentar' => $this->request->getPost('isi'),
            'tanggal' =>date('Y-m-d H:i:s')
        ];

        $ulasanModel->insert($data);
        
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
        $id = session()->get('id');

        $dataUpdate = [
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
                                                        ->orLike('asal', $keyword)
                                                        ->findAll() : $jadwalModel->findAll();
        $data['keyword'] = $keyword;
        return view('penumpang/jadwal', $data);
    }

    public function pesan_tiket()
    {
        if (!session()->has('id')) return redirect()->to(base_url('login'));

        $transaksiModel = new \App\Models\TransaksiModel();
        $jadwalModel = new \App\Models\JadwalModel();

        $id_jadwal = $this->request->getPost('id_jadwal');
        $daftar_kursi = $this->request->getPost('nomor_kursi');

        if (empty($daftar_kursi)) {
            return redirect()->back()->with('error', 'Silahkan pilih minimal satu kursi!');
        }
        if (count($daftar_kursi) > 6) {
            return redirect()->back()->with('error', 'Maksimal pemesanan adalah 6 kursi!');
        }

        $jadwal = $jadwalModel->find($id_jadwal);
        $harga_per_kursi = $jadwal['harga'] ?? 0;
        $kode_tiket = 'SB-' . strtoupper(bin2hex(random_bytes(4)));
       

        foreach ($daftar_kursi as $kursi) {
            $transaksiModel->insert([
                'id_user' => session()->get('id'),
                'id_jadwal' =>$id_jadwal,
                'nomor_kursi' => $kursi,
                'total_harga' => $harga_per_kursi,
                'status_pembayaran' => 'Pending',
                'kode_tiket' => $kode_tiket,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->to(base_url('penumpang/detail_pesanan/' . $kode_tiket))
                         ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function pilih_kursi($id_jadwal)
    {
        $jadwalModel = new \App\Models\JadwalModel();
        $transaksiModel = new \App\Models\TransaksiModel();

        $jadwal = $jadwalModel->select('jadwal.*, bus.kapasitas')
                              ->join('bus', 'bus.id = jadwal.id', 'left')
                              ->find((int)$id_jadwal);

        if(!$jadwal) {
            return redirect()->to(base_url('penumpang/jadwal'))->with('error', 'Jadwal tidak ditemukan!');
        }

        $kursi_terpesan = [];

        $transaksi = $transaksiModel->where('id_jadwal', $id_jadwal)
                                    ->findAll();
        
        if ($transaksi) {
            $kursi_terpesan = array_column($transaksi, 'nomor_kursi');
        }

        $kapasitas = (int)($jadwal['kapasitas'] ?? 0);
        $daftar_semua_kursi = [];
        for ($i = 1; $i <= ($kapasitas / 2); $i++) {
            $daftar_semua_kursi[] = 'A' . $i;
            $daftar_semua_kursi[] = 'B' . $i;
        }
            
        $data = [
            'jadwal' => $jadwal,
            'kursi_terpesan' => $kursi_terpesan,
            'daftar_semua_kursi' => $daftar_semua_kursi,
        ];

        return view('penumpang/pilih_kursi', $data);
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

    public function etiket($kode_tiket)
    {
        if (!session()->has('id')) return redirect()->to(base_url('login'));

        $transaksiModel = new \App\Models\TransaksiModel();
        $rows = $transaksiModel->select('transaksi.*, jadwal.nama_bus, jadwal.asal, jadwal.tujuan, jadwal.jam_keberangkatan')
                                        ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                                        ->where('transaksi.kode_tiket', $kode_tiket)
                                        ->where('transaksi.id_user', session()->get('id'))
                                        ->findAll();

        if (empty($rows) || $rows[0]['status_pembayaran'] !== 'Lunas') {
            return redirect()->to(base_url('penumpang/riwayat'))->with('error', 'E-tiket belum tersedia.');
        }

        $data['tiket'] = $rows[0];
        $data['kode_tiket'] = $kode_tiket;
        $data['daftar_kursi'] = array_column($rows, 'nomor_kursi');
        $data['total_bayar'] = array_sum(array_column($rows, 'total_harga'));

        return view('penumpang/etiket', $data);
    }

    public function detail_pesanan($kode_tiket)
    {
        if (!session()->has('id')) return redirect()->to(base_url('login'));

        $transaksiModel = new \App\Models\TransaksiModel();
        $rows = $transaksiModel->select('transaksi.*, jadwal.nama_bus, jadwal.asal, jadwal.tujuan, jadwal.jam_keberangkatan')
                               ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                               ->where('transaksi.kode_tiket', $kode_tiket)
                               ->where('transaksi.id_user', session()->get('id'))
                               ->findAll();

        if (empty($rows)) {
            return redirect()->to(base_url('penumpang/riwayat'))->with('error', 'Pesanan tidak ditemukan!');
        }

        $data['pesanan'] = $rows[0];
        $data['kode_tiket'] = $kode_tiket;
        $data['daftar_kursi'] = array_column($rows, 'nomor_kursi');
        $data['total_bayar'] = array_sum(array_column($rows, 'total_harga'));
        $data['status'] = $rows[0]['status_pembayaran'];
        
        return view('penumpang/detail_pesanan', $data);
    }

    public function bayar_sekarang($kode_tiket)
    {
        if (!session()->has('id')) return redirect()->to(base_url('login'));

        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksiModel->where('kode_tiket', $kode_tiket)
                       ->where('id_user', session()->get('id'))
                       ->set(['status_pembayaran' => 'Lunas'])
                       ->update();

        return redirect()->to(base_url('penumpang/dashboard'))
                         ->with('success', 'Pembayaran berhasil Tiket Anda sudah aktif.');
    }
}