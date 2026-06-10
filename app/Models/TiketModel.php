<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'pemesanan_tiket';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user','id_jadwal','nomor_kursi','status_pembayaran'];

    public function getRiwayat($id_user)
    {
        return $this->select('pemesanan_tiket.*, jadal.nama_bus, jadwal.asal, jadwal.jam_keberangkatan, jadwal.harga')
                    ->join('jadwal', 'jadwal.id = pemesanan_tiket.id_jadwal')
                    ->where('id_user', $id_user)
                    ->findAll();
    }
}

