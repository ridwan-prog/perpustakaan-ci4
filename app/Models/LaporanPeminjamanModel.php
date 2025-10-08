<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanPeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';

    protected $allowedFields = [
        'peminjaman_buku',
        'peminjaman_anggota',
        'peminjaman_tanggal_mulai',
        'peminjaman_tanggal_sampai',
        'peminjaman_status'
    ];
}
