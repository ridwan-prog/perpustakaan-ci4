<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PeminjamanModel;


class Admin extends BaseController
{
    public function index()
{
    if (session()->get('role') != 'admin') {
        return redirect()->to('/login');
    }

        // Ambil jumlah anggota dari database
        $anggotaModel = new AnggotaModel();
        $data['jumlahAnggota'] = $anggotaModel->countAll(); 

        $bukuModel = new BukuModel();
        $data['jumlahBukuTersedia'] = $bukuModel->getJumlahBukuTersedia();

        $peminjamanModel = new PeminjamanModel();
        $data['jumlahPinjamanAktif'] = $peminjamanModel->getJumlahPinjamanAktif();

        $peminjamanModel = new \App\Models\PeminjamanModel();
        $data['jumlahPengembalianTerlambat'] = $peminjamanModel->getJumlahPengembalianTerlambat();

        $peminjamanModel = new \App\Models\PeminjamanModel();
        $data['bukuPopuler'] = $peminjamanModel->getBukuPopuler();



        $peminjamanModel = new \App\Models\PeminjamanModel();
        $peminjamanPerBulan = $peminjamanModel->getPeminjamanPerBulan();

        $data['labels'] = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $data['dataPeminjaman'] = array_values($peminjamanPerBulan);

    return view('admin/dashboard', $data);
}


    public function create()
    {
        // Tampilkan form tambah admin
        return view('admin/create');
    }

    public function store()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $adminModel = new AdminModel();
        $adminModel->insert([
            'username' => $username,
            'password' => $hashedPassword
        ]);

        return redirect()->to('/admin/create')->with('success', 'Admin berhasil ditambahkan');
    }

}
