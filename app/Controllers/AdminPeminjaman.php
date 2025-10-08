<?php

namespace App\Controllers;
use App\Models\PeminjamanModel;

class AdminPeminjaman extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $model = new PeminjamanModel();
        $data['peminjaman'] = $model->getAllWithRelations();
        return view('admin/peminjaman/index', $data);
    }
}
