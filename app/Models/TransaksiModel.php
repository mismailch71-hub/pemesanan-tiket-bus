<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi'; 
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_user', 
        'id_jadwal', 
        'nomor_kursi', 
        'status_pembayaran', 
        'total_harga',
        'created_at',
        'kode_tiket'
    ];

    public function getTransaksiLengkap()
    {
        return $this->select('transaksi.*, users.username, jadwal.nama_bus, jadwal.tujuan')
                    ->join('users', 'users.id = transaksi.id_user')
                    ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                    ->findAll();
    }
}