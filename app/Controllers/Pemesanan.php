<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TiketModel;

class Pemesanan extends BaseController
{
    protected JadwalModel $jadwalModel;
    protected TiketModel $tiketModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->tiketModel = new TiketModel();
    }

    public function index()
    {
        return view('layout/header') . view('portal') . view('layout/footer');
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

    public function pilihKursi(int $id_jadwal)
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

    public function tambah()
    {
        return view('layout/header') . view('admin/tambah') . view('layout/footer');
    }

    public function simpan()
    {
        $this->jadwalModel->save([
            'nama_bus' => $this->request->getPost('nama_bus'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
            'jam_keberangkatan' => $this->request->getPost('jam_keberangkatan'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to(base_url('admin/dashboard'))->with('sukses', 'Jadwal bus baru berhasil ditambahkan!');
    }

    public function edit(int $id)
    {
        $data['jadwal'] = $this->jadwalModel->find($id);

        if(empty($data['jadwal'])) {
            return redirect()->to(base_url('admin/dashboard'))->with('error', 'Jadwal bus tidak ditemukan!');
        }

        return view('layout/header') . view('admin/edit', $data) . view('layout/footer');
    }

    public function update(int $id)
    {
        $this->jadwalModel->update($id, [
            'nama_bus' => $this->request->getPost('nama_bus'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
            'jam_keberangkatan' => $this->request->getPost('jam_keberangkatan'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to(base_url('admin/dasboard'))->with('sukses', 'Jadwal bus berhasil diperbarui!');
    }

    public function hapus(int $id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to(base_url('admin/dashboard'))->with('sukses', 'jadwal bus berhasil dihapus!');
    }
}