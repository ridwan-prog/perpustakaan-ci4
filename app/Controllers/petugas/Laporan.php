<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\LaporanPeminjamanModel;

class Laporan extends BaseController
{
    protected $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanPeminjamanModel();
    }

    public function index()
    {
        return view('petugas/laporan/index');
    }

    public function cetak()
{
    $tanggal_awal  = $this->request->getPost('tanggal_awal');
    $tanggal_akhir = $this->request->getPost('tanggal_akhir');

    $peminjaman = $this->laporanModel
        ->select('peminjaman.*, anggota.nama AS nama_anggota, buku.judul AS judul_buku')
        ->join('anggota', 'anggota.id = peminjaman.peminjaman_anggota')
        ->join('buku', 'buku.id = peminjaman.peminjaman_buku')
        ->where('peminjaman_tanggal_mulai >=', $tanggal_awal)
        ->where('peminjaman_tanggal_mulai <=', $tanggal_akhir)
        ->findAll();

    // Ambil nama petugas dari session
    $nama_petugas = session()->get('nama'); // pastikan field 'nama' tersimpan di session saat login

    $data = [
        'peminjaman'    => $peminjaman,
        'tanggal_awal'  => $tanggal_awal,
        'tanggal_akhir' => $tanggal_akhir,
         'nama_petugas'  => session()->get('nama')
    ];
   


    return view('petugas/laporan/cetak', $data);
}

}
