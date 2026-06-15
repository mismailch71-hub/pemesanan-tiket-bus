<?php
namespace App\Models;
use CodeIgniter\Model;

class BusModel extends Model {
    protected $table = 'bus';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_bus', 'nomor_plat', 'kelas', 'kapasitas'];
}