<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\PeminjamanModel;
use App\Models\BukuModel;

class Dashboard extends BaseController
{
  public function index()
{
    $anggotaModel = new AnggotaModel();
    $bukuModel = new BukuModel();
    $peminjamanModel = new PeminjamanModel();

    // Data jumlah anggota, buku, pinjaman dll
    $jumlahAnggota = $anggotaModel->countAllResults();
    $jumlahBukuTersedia = $bukuModel->getJumlahBukuTersedia();
    $jumlahPinjamanAktif = $peminjamanModel->getJumlahPinjamanAktif();
    $jumlahPengembalianTerlambat = $peminjamanModel->getJumlahPengembalianTerlambat();

    // Ambil data peminjaman per bulan (array 1-12)
    $dataBulanan = $peminjamanModel->getPeminjamanPerBulan();

    // Ubah angka bulan jadi nama bulan
    $bulanNama = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];

    $labels = [];
    $dataPeminjaman = [];

    foreach ($dataBulanan as $bulan => $jumlah) {
        $labels[] = $bulanNama[$bulan];
        $dataPeminjaman[] = $jumlah;
    }

    // Kirim data ke view
    $data = [
        'jumlahAnggota' => $jumlahAnggota,
        'jumlahBukuTersedia' => $jumlahBukuTersedia,
        'jumlahPinjamanAktif' => $jumlahPinjamanAktif,
        'jumlahPengembalianTerlambat' => $jumlahPengembalianTerlambat,
        'labels' => $labels,
        'dataPeminjaman' => $dataPeminjaman,
    ];

    // Ambil data buku populer
    $bukuPopuler = $peminjamanModel->getBukuPopuler(5);

    $data = [
        'jumlahAnggota' => $jumlahAnggota,
        'jumlahBukuTersedia' => $jumlahBukuTersedia,
        'jumlahPinjamanAktif' => $jumlahPinjamanAktif,
        'jumlahPengembalianTerlambat' => $jumlahPengembalianTerlambat,
        'labels' => $labels,
        'dataPeminjaman' => $dataPeminjaman,
        'bukuPopuler' => $bukuPopuler,
    ];

    return view('petugas/dashboard', $data);
}


}
