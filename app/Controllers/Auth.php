<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Jika pengguna MEMANG SUDAH LOGIN, langsung alihkan ke halaman sesuai hak aksesnya
        if (session()->get('isLoggedIn')) {
            $role = session()->get('role');
            if ($role === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            } elseif ($role === 'petugas') {
                return redirect()->to(base_url('petugas/dashboard'));
            } else {
                return redirect()->to(base_url('jadwal'));
            }
        }

        // 🔥 Panggil langsung view login agar tampil Full Page tanpa terganggu navbar global
        return view('auth/login');
    }

    public function prosesLogin()
    {
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Mencari data user berdasarkan username di database db_tiket_bus
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Validasi string teks biasa (tanpa enkripsi password_hash demi kemudahan praktikum)
            if ($password == $user['password']) {
                
                session()->set([
                    'isLoggedIn' => true,
                    'username'   => $user['username'],
                    'role'       => $user['role'] 
                ]);

                // Pengalihan halaman berdasarkan role tabel users
                if ($user['role'] === 'admin') {
                    return redirect()->to(base_url('admin/dashboard'));
                } elseif ($user['role'] === 'petugas') {
                    return redirect()->to(base_url('petugas/dashboard'));
                } elseif ($user['role'] === 'penumpang' || $user['role'] === 'pelanggan') {
                    return redirect()->to(base_url('jadwal'));
                } else {
                    return redirect()->to(base_url('jadwal'));
                }

            } else {
                session()->setFlashdata('gagal_pesan', 'Password salah!');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('gagal_pesan', 'Username tidak terdaftar!');
            return redirect()->to(base_url('login'));
        }
    }

    public function register()
    {
        // Jika sudah login, tidak boleh mengakses halaman register kembali
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('jadwal'));
        }

        // 🔥 Panggil langsung view register agar tetap rapi full page
        return view('auth/register');
    }

    public function prosesRegister()
    {
        $userModel = new UserModel();

        // Menyimpan pendaftaran akun baru dengan role 'penumpang' agar sinkron dengan database Anda
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), 
            'role'     => 'penumpang' 
        ]);

        session()->setFlashdata('sukses_pesan', 'Pendaftaran Akun berhasil! Silakan masuk.');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}