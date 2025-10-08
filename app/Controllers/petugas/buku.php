<?php
namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('petugas/buku/index', $data);
    }

    public function create()
    {
        return view('petugas/buku/create');
    }

    public function store()
    {
    //      $postData = $this->request->getPost();
    // dd($postData);

        $this->bukuModel->save([
            'judul' => $this->request->getPost('judul'),
            'tahun' => $this->request->getPost('tahun'),
            'penulis' => $this->request->getPost('penulis'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/petugas/buku');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/petugas/buku');
    }

    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);
        return view('petugas/buku/edit', $data);
    }

    public function update($id)
    {
        $this->bukuModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'tahun' => $this->request->getPost('tahun'),
            'penulis' => $this->request->getPost('penulis'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/petugas/buku');
    }
}
