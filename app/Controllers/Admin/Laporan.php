<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CetakModel;

class Laporan extends BaseController
{
    protected $cetakModel;

    public function __construct()
    {
        $this->cetakModel = new CetakModel();
    }

    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
        return view('admin/laporan/index');
    }

    public function cetak()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        // Validasi sederhana (bisa diperluas)
        if (!$tanggal_awal || !$tanggal_akhir) {
            return redirect()->back()->with('error', 'Tanggal harus diisi');
        }

        $dataLaporan = $this->cetakModel->getLaporanPeminjaman($tanggal_awal, $tanggal_akhir);

        $data = [
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'laporan' => $dataLaporan,
        ];

        // Tampilkan view cetak yang simpel, khusus print
        return view('admin/laporan/cetak', $data);
    }
}
