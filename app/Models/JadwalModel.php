<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Models;

class JadwalModel extends Model
{
    protected $table = 'jadwa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_bus','asal','tujuan','jam_keberangkatan','harga','total_kursi'];

}