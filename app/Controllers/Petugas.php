<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function index()
    {
        if (session()->get('role') != 'petugas') {
            return redirect()->to('/login');
        }
        return view('petugas/dashboard');
    }
}
