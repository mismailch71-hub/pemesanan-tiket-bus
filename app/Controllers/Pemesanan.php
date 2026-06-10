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
            $data['daftar_jadwal'] = $this->jadwal<odel->findAll()
        }
    }
}