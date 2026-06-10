<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TiketModel;

class Pemesanan extends BaseController
{
    protected $jadwalModel;
    protected $tiketModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->tiketModel = new TiketModel();
    }

    public function index()
    {
        return view('layout/header') . view('penumpang/home') . view('layout/footer');
    }

    public function jadwal()
    {
        $cari = $this->request->getget('cari');
        if ($cari) {
            $data['daftar_jadwal'] = $this->jadwalModel->like('asal', $cari)->orlike('tujuan', $cari)->findAll();
        } else {
            $data['daftar_jadwal'] = $this->jadwalModel->findAll();
        }
        $data['keyword'] = $cari ??'';

        return view('layout/header') . view('penumpang/jadwal', $data) . view('layout/footer');
    }

    public function pilihKursi($id_jadwal)
    {
        $data['jadwal'] = $this->jadwalModel->find($id_jadwal);

        $terisi = $this->tiketModel->where('id_jadwal', $id_jadwal)->findColumn('nomor_kursi');
        $data['kursi_terisi'] = $terisi ? $terisi : [];

        return view('layout/header') . view('penumpang/pilih_kursi', $data) . view('layout/footer');
    }

    public function simpanTransaksi()
    {
        $this->tiketModel->save([
            'id_user' => 1,
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'nomor_kursi' => $this->request->getPost('nomor_kursi'),
            'status_pembayaran' => 'Belum Bayar'
        ]);

        session()->setFlashdata('sukses_pesan', 'Tiket Bus berhasil dipesan! Silakan cek riwayat.');
        return redirect()->to(base_url('riwayat'));
    }

    public function riwayat()
    {
        $data['tiket'] = $this->tiketModel->getRiwayat(1);
        return view('layout/header') . view('penumpang/riwayat', $data) . view('layout/footer');
    }
}