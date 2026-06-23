<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Gunakan satu kunci 'isLoggedIn' untuk semua pengecekan
        if (session()->get('isLoggedIn')) {
            $role = session()->get('role');
            return redirect()->to(base_url($role . '/dashboard'));
        }
        return view('auth/login');
    }

    public function prosesLogin()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $userModel->where('username', $username)->first();

        if ($user && $password == $user['password']) {
            session()->set([
                'id'         => $user['id'], 
                'isLoggedIn' => true,
                'username'   => $user['username'],
                'role'       => $user['role'] 
            ]);

            return redirect()->to(base_url($user['role'] . '/dashboard'));
        }

        session()->setFlashdata('gagal_pesan', 'Username atau password salah!');
        return redirect()->to(base_url('login'));
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url(session()->get('role') . '/dashboard'));
        }
        return view('auth/register');
    }

    public function prosesRegister()
    {
        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), 
            'role'     => 'penumpang' 
        ]);
        session()->setFlashdata('sukses_pesan', 'Pendaftaran berhasil!');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    public function auth_process()
    {
        $userModel = new \App\Models\UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $userModel->where('username', $username)->first();
        

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id'         => $user['id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'isLoggedIn' => true 
            ]);
            return redirect()->to(base_url($user['role'] . '/dashboard'));
        }
        return redirect()->back()->with('error', 'Username atau password salah!');
    }
}