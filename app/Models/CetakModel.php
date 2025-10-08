<?php

namespace App\Models;

use CodeIgniter\Model;

class CetakModel extends Model
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

    public function getLaporanPeminjaman($tanggal_awal, $tanggal_akhir)
    {
        return $this->select('peminjaman.*, anggota.nama as nama_anggota, buku.judul as judul_buku')
                    ->join('anggota', 'anggota.id = peminjaman.peminjaman_anggota')
                    ->join('buku', 'buku.id = peminjaman.peminjaman_buku')
                    ->where('peminjaman_tanggal_mulai >=', $tanggal_awal)
                    ->where('peminjaman_tanggal_mulai <=', $tanggal_akhir)
                    ->orderBy('peminjaman_tanggal_mulai', 'ASC')
                    ->findAll();
    }
}
