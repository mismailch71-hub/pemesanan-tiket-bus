<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\JadwalModel;

class Admin extends BaseController
{
    protected UserModel $userModel;
    protected JadwalModel $jadwalModel;

    public function __construct() 
    {
        $this->userModel = new UserModel();
        $this->jadwalModel = new JadwalModel();
    }

    private function proteksiAdmin()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('login'))->send();
        }
    }

    public function dashboard()
    {
        $this->proteksiAdmin();
        return view('admin/dashboard');
    }

    public function pengguna()
    {
        $this->proteksiAdmin();
        $data['semua_pengguna'] = $this->userModel->findAll();
        return view('admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $this->proteksiAdmin();
        return view('admin/tambah');
    }

    public function simpan_pengguna()
    {
        $this->proteksiAdmin();
        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to(base_url('admin/pengguna'))->with('sukses', 'Pengguna baru berhasil didaftarkan!');
    }

    public function edit_pengguna(int $id)
    {
        $this->proteksiAdmin();
        $data['user'] = $this->userModel->find($id);
        return view('admin/edit', $data);
    }

    public function update_pengguna(int $id)
    {
        $this->proteksiAdmin();
        $dataUpdate = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
        ];
        if ($this->request->getPost('password') != '') {
            $dataUpdate['password'] = $this->request->getPost('password');
        }
        $this->userModel->update($id, $dataUpdate);
        return redirect()->to(base_url('admin/pengguna'))->with('sukses','Data akun berhasil diperbarui!');
    }

    public function hapus_pengguna(int $id)
    {
        $this->proteksiAdmin();
        $this->userModel->delete($id);
        return redirect()->to(base_url('admin/pengguna'))->with('sukses', 'Akun berhasil dihapus dari sistem!');
    }

    public function jadwal()
    {
        $this->proteksiAdmin();
        $data['daftar_jadwal'] = $this->jadwalModel->findAll();
        return view('admin/jadwal', $data);
    }

    public function tambah_jadwal()
    {
        $this->proteksiAdmin();
        return view('admin/tambah_jadwal');
    }

    public function simpan_jadwal()
    {
        $this->proteksiAdmin();
        $this->jadwalModel->save([
            'nama_bus' => $this->request->getPost('nama_bus'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
            'jam_keberangkatan' => $this->request->getPost('jam_keberangkatan'),
            'harga' => $this->request->getPost('harga'),
        ]);
        return redirect()->to(base_url('admin/jadwal'))->with('sukses', 'Jadwal bus baru berhasil ditambahkan!');
    }

    public function edit_jadwal(int $id) 
    {
        $this->proteksiAdmin();
        $data['jadwal'] = $this->jadwalModel->find($id);
        if(empty($data['jadwal'])) {
            return redirect()->to(base_url('admin/jadwal'))->with('error', 'Jadwal bus tidak ditemukan!');
        }
        return view('admin/edit_jadwal', $data);
    }

    public function update_jadwal(int $id)
    {
        $this->proteksiAdmin();
        $this->jadwalModel->update($id, [
            'nama_bus' => $this->request->getPost('nama_bus'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
            'jam_keberangkatan' => $this->request->getPost('jam_keberangkatan'),
            'harga' => $this->request->getPost('harga'),
        ]);
        return redirect()->to(base_url('admin/jadwal'))->with('sukses', 'Jadwal bus berhasil diperbarui!');
    }

    public function hapus_jadwal(int $id)
    {
        $this->proteksiAdmin();
        $this->jadwalModel->delete($id);
        return redirect()->to(base_url('admin/jadwal'))->with('sukses', 'jadwal bus berhasil dihapus!');
    }

    public function bus()
    {
        $this->proteksiAdmin();
        return view('admin/bus');
    }

    public function keuangan()
    {
        $this->proteksiAdmin();
        return view('admin/keuangan');
    }

    public function ulasan()
    {
        $this->proteksiAdmin();
        return view('admin/ulasan');
    }
}