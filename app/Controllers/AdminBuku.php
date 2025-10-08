<?php

namespace App\Controllers;
use App\Models\BukuModel;

class AdminBuku extends BaseController
{
    public function index()
    {
        // Cek jika bukan admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $model = new BukuModel();
        $data['buku'] = $model->findAll();
        return view('admin/buku/index', $data);
    }
}
