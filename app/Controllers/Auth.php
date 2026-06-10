<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('layout/header') . view('auth/login') . view('layout/footer');
    }

    public function prosesLogin()
    {
        session()->set([
            'isLoggedIn' => true,
            'username' => $this->request->getPost('username')
        ]);
        return redirect()->to(base_url('jadwal'));
    }

    public function register()
    {
        return view('layout/header') . view('auth/register') . view('layout/footer');
    }

    public function prosesRegister()
    {
        session()->setFlashdata('sukses_pesan', 'Pendaftaran Akun berhasil! Silakan masuk.');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}