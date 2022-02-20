<?php

namespace App\Controllers;

class Home extends BaseController
{
    // menampilkan halaman home
    public function index()
    {
        $data = [
            'judul_web' => 'LaporDulu',
        ];
        return view('home/index', $data);
    }
}
