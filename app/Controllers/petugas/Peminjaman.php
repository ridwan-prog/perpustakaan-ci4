<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\AnggotaModel;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjamanModel
            ->join('buku', 'buku.id = peminjaman.peminjaman_buku', 'left')
            ->join('anggota', 'anggota.id = peminjaman.peminjaman_anggota', 'left')
            ->findAll();

        return view('petugas/peminjaman/index', $data);
    }

    public function tambah()
    {
        $data['buku'] = (new BukuModel())->where('status', 'tersedia')->findAll();
        $data['anggota'] = (new AnggotaModel())->findAll();

        return view('petugas/peminjaman/tambah', $data);
    }

    public function simpan()
    {
        $this->peminjamanModel->save([
            'peminjaman_buku' => $this->request->getPost('buku'),
            'peminjaman_anggota' => $this->request->getPost('anggota'),
            'peminjaman_tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'peminjaman_tanggal_sampai' => $this->request->getPost('tanggal_sampai'),
            'peminjaman_status' => 'dipinjam',
        ]);

        // Update status buku
        $bukuModel = new BukuModel();
        $bukuModel->update($this->request->getPost('buku'), ['status' => 'dipinjam']);

        return redirect()->to(base_url('petugas/peminjaman'));
    }

    public function selesai($id)
    {
        $data = $this->peminjamanModel->find($id);
        $this->peminjamanModel->update($id, ['peminjaman_status' => 'selesai']);

        // Update status buku jadi tersedia
        $bukuModel = new BukuModel();
        $bukuModel->update($data['peminjaman_buku'], ['status' => 'tersedia']);

        return redirect()->to(base_url('petugas/peminjaman'));
    }
}
