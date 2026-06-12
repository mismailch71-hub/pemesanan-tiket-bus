<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // 1. Hubungkan ke nama tabel database Anda
    protected $table            = 'users';
    
    // 2. Tentukan primary key tabel Anda
    protected $primaryKey       = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // 3. 🔥 KUNCI PERBAIKAN: Berikan izin akses untuk kolom tabel Anda 🔥
    protected $allowedFields    = ['username', 'password', 'role'];

    protected $useTimestamps    = false;
}