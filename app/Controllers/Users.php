<?php

namespace App\Controllers;

use App\Models\MasyarakatModel;

class Users extends BaseController
{
    protected $usersmodel;

    public function __construct()
    {
        $this->masyarakatmodel = new MasyarakatModel();
    }

    // menampilkan halaman user
    public function index()
    {
        $data = [
            'judul_web' => 'User',
            // MENMAPILKAN DATA DENGAN MODELING DATA
            'user' => $this->masyarakatmodel->findAll()
        ];
        return view('user/index', $data);
    }
}
