<?php

namespace App\Controllers;
use App\Models\PetugasModel;
use App\Models\AnggotaModel; 
class AdminPetugas extends BaseController
{
    public function __construct()
    {
        // Cek session role admin, jika bukan redirect ke login
        if (session()->get('role') !== 'admin') {
            // redirect tidak bisa langsung dipanggil di constructor, 
            // maka kita lakukan redirect manual dengan header dan exit
            header('Location: ' . base_url('/login'));
            exit;
        }
    }
    public function index()
    {
         $petugasModel = new PetugasModel();
        $anggotaModel = new AnggotaModel();

        

         $data = [
            'petugas' => $petugasModel->findAll(),
            'jumlahAnggota' => $anggotaModel->countAllResults(),  // hitung jumlah anggota
        ];

        return view('admin/petugas/index', $data);
    }

    public function create()
    {
        return view('admin/petugas/create');
    }

    public function store()
    {
        $model = new PetugasModel();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $model->insert($data);
        return redirect()->to('/admin/petugas');
    }

    public function edit($id)
    {
        $model = new PetugasModel();
        $data['petugas'] = $model->find($id);
        return view('admin/petugas/edit', $data);
    }

    public function update($id)
    {
        $model = new PetugasModel();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $model->update($id, $data);
        return redirect()->to('/admin/petugas');
    }

    public function delete($id)
    {
        $model = new PetugasModel();
        $model->delete($id);
        return redirect()->to('/admin/petugas');
    }
}
