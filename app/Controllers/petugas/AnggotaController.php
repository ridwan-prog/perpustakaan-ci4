<?php namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class AnggotaController extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data['anggota'] = $this->anggotaModel->findAll();
        return view('petugas/anggota/index', $data);
    }

    public function create()
    {
        return view('petugas/anggota/create');
    }

    public function store()
    {
        $this->anggotaModel->save([
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'alamat' => $this->request->getPost('alamat'),
        ]);
        return redirect()->to(base_url('petugas/anggota'));
    }

    public function edit($id)
    {
        $data['anggota'] = $this->anggotaModel->find($id);
        return view('petugas/anggota/edit', $data);
    }

    public function update($id)
    {
        $this->anggotaModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'alamat' => $this->request->getPost('alamat'),
        ]);
        return redirect()->to(base_url('petugas/anggota'));
    }

    public function delete($id)
    {
        $this->anggotaModel->delete($id);
        return redirect()->to(base_url('petugas/anggota'));
    }
}
