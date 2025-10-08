<?php

namespace App\Models;
use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id'; 
    protected $allowedFields = [
        'peminjaman_anggota',
        'peminjaman_buku',
        'peminjaman_tanggal_mulai',
        'peminjaman_tanggal_sampai',
        'peminjaman_status'
    ]; 

    public function getAllWithRelations()
    {
        return $this->select('peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku')
                    ->join('anggota', 'anggota.id = peminjaman.peminjaman_anggota')
                    ->join('buku', 'buku.id = peminjaman.peminjaman_buku') 
                    ->findAll();
    }

    public function getByDateRange($start, $end)
    {
        return $this->select('peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku')
                    ->join('anggota', 'anggota.id = peminjaman.peminjaman_anggota')
                    ->join('buku', 'buku.id = peminjaman.peminjaman_buku')
                    ->where('peminjaman_tanggal_mulai >=', $start)
                    ->where('peminjaman_tanggal_mulai <=', $end)
                    ->findAll();
    }

    public function getJumlahPinjamanAktif()
{
    return $this->where('peminjaman_status', 'dipinjam')->countAllResults();
}

public function getJumlahPengembalianTerlambat()
{
    $today = date('Y-m-d');
    return $this->where('peminjaman_status', 'dipinjam')
                ->where('peminjaman_tanggal_sampai <', $today)
                ->countAllResults();
}

public function getBukuPopuler($limit = 5)
{
    return $this->select('buku.judul, COUNT(peminjaman.peminjaman_buku) AS total_pinjam')
                ->join('buku', 'buku.id = peminjaman.peminjaman_buku')
                ->groupBy('peminjaman.peminjaman_buku')
                ->orderBy('total_pinjam', 'DESC')
                ->limit($limit)
                ->findAll();
}

public function getPeminjamanPerBulan($tahun = null)
{
    if (!$tahun) {
        $tahun = date('Y');
    }

    // Query hitung jumlah peminjaman per bulan pada tahun tertentu
    $builder = $this->builder();
    $builder->select("MONTH(peminjaman_tanggal_mulai) as bulan, COUNT(*) as total")
            ->where('YEAR(peminjaman_tanggal_mulai)', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan');

    $query = $builder->get();
    $result = $query->getResultArray();

    // Inisialisasi array 12 bulan dengan 0
    $data = array_fill(1, 12, 0);
    foreach ($result as $row) {
        $data[(int)$row['bulan']] = (int)$row['total'];
    }

    return $data;
}


}
