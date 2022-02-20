<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;

class Dashboard extends BaseController
{
    // menampilkan halaman dashboard

    public function __construct()
    {
        $this->usermodel = new MasyarakatModel();
        $this->adminmodel = new AdminModel();
        $this->pengaduanmodel = new PengaduanModel();
    }

    public function index()
    {
        $countuser = $this->usermodel->getCount();
        $countpetugas = $this->adminmodel->getCountAdmin(1);
        $countpengaduan = $this->pengaduanmodel->getCountPengaduan();
        $countverif = $this->pengaduanmodel->getCountPengaduanVerif('selesai');
        $countproses = $this->pengaduanmodel->getCountPengaduanVerif('proses');
        $counttolak = $this->pengaduanmodel->getCountPengaduanVerif('ditolak');
        $data = [
            'judul_web' => 'Dashboard',
            'user' => $countuser,
            'petugas' => $countpetugas,
            'pengaduan' => $countpengaduan,
            'verif' => $countverif,
            'proses' => $countproses,
            'tolak' => $counttolak,
        ];
        return view('dashboard/index', $data);
    }
}
