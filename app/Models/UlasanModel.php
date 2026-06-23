<?php
namespace App\Models;
use CodeIgniter\Model;

class UlasanModel extends Model {
    protected $table = 'ulasan';
    protected $allowedFields = ['id', 'username', 'bintang', 'komentar', 'tanggal'];
}