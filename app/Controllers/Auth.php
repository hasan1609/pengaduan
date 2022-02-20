<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->adminmodel = new AdminModel();
    }

    // menampilkan halaman login
    public function index()
    {
        $data = [
            'judul_web' => 'Masuk',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/index', $data);
    }

    // proses login dan set session
    public function cek_login()
    {
        // pendefinisian form input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // TETNTUKAN RULE VALIDASI
        $val = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ]);
        // lakukan proses validasi
        if (!$val) {
            // jika validasi gagal maka tampilkan pesan error
            $validasi = \Config\Services::validation();
            return redirect()->to('/auth')->withInput()->with('validation', $validasi);
        } else {
            // jika lolos validasi maka lakukan proses login
            // cek usernme apakah ada
            $query = $this->adminmodel->getWhere(['username' => $username]);
            $usernamecek = $query->getRow();
            if ($usernamecek) {
                // jika username ada maka cek password
                if (password_verify($password, $usernamecek->password)) {
                    // jika password sbenar dan username ada maka lakukan proses login
                    $setsession = [
                        'id_petugas' => $usernamecek->id_petugas,
                        'nama_petugas' => $usernamecek->nama_petugas,
                        'id_level' => $usernamecek->id_level
                    ];
                    // simpan session
                    // LALU BUKA FOLDER APP/FILTER DAN TENTUKAN SESSIONNYA
                    session()->set($setsession);
                    return redirect()->to('/home');
                } else {
                    // jika password salah
                    session()->setFlashdata('pesan', 'Maaf Password salah');
                    return redirect()->to('/auth');
                }
            } else {
                // juka username tidak terdaftar
                session()->setFlashdata('pesan', 'Maaf Username tidak terdaftar');
                return redirect()->to('/auth');
            }
        }
    }

    // logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
