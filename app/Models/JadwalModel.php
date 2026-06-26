<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Models;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_bus','asal','tujuan','jam_keberangkatan','tanggal_keberangkatan','harga','total_kursi', 'id_bus'];

}