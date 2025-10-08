<?php

namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','judul', 'tahun','penulis','status'];

    public function getJumlahBukuTersedia()
    {
        return $this->where('status', 'tersedia')->countAllResults();
    }
}


// 'penerbit', 'tahun_terbit', 'jumlah'