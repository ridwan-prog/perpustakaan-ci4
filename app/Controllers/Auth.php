<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\PetugasModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek ke tabel admin
        $adminModel = new AdminModel();
        $admin = $adminModel->where('username', $username)->first();
        if ($admin && password_verify($password, $admin['password'])) {
            session()->set(['logged_in' => true, 'role' => 'admin', 'id' => $admin['id']]);
            return redirect()->to('/admin');
        }

                // Cek ke tabel petugas
        $petugasModel = new PetugasModel();
        $petugas = $petugasModel->where('username', $username)->first();
        if ($petugas && password_verify($password, $petugas['password'])) {
            session()->set([
                'logged_in' => true,
                'role'      => 'petugas',
                'id'        => $petugas['id'],
                'nama'      => $petugas['nama'], // ← ini penting
                'username'  => $petugas['username']
            ]);
            return redirect()->to('/petugas');
        }


        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
