<?php

namespace App\Controllers;

use App\Models\MasyarakatModel;

class Login extends BaseController
{

    public function __construct()
    {
        $this->masyarakatmodel = new MasyarakatModel();
    }

    // menampilkan halaman login
    public function index()
    {
        $data = [
            'judul_web' => 'Login',
            'validation' => \Config\Services::validation()

        ];
        return view('login/index', $data);
    }

    // proses pendaftaran dan simpan data kedatabase
    public function create()
    {
        // TENTUKAN RULE FORM LOGIN
        $validasi = $this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,5024]|is_image[foto]|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png,image/PNG,]',
                'errors' => [
                    'uploaded' => 'Harap masukkan foto terlebih dahulu',
                    'max_size' => 'Gambar Maksimal 5MB',
                    'is_image' => 'Harap pilih gambar',
                    'mime_in' => 'Format gambar hanya JPG, JPEG, PNG'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah digunakan',
                ]
            ],
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[15]|is_unique[user.nik]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} tidak valid',
                    'is_unique' => '{field} sudah digunakan',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tlp' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 6 karakter'
                ]
            ]
        ]);
        // LAKUKAN PROSES VALIDASI
        if (!$validasi) {
            $val = \Config\Services::validation();
            return redirect()->to('/login#signup')->withInput()->with('validation', $val);
        } else {
            // JIKA BERHASIL MELAKUKAN VALIDASI
            // ambil foto
            $filefoto = $this->request->getFile('foto');
            // ambil nama file lalu generate
            $namafoto = $filefoto->getRandomName();
            // tetukan folder penyimpanan
            $filefoto->move('images/user', $namafoto);
            // tentukan data yang akan disimpan sesuai dengan database dan form isian
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'tlp' => $this->request->getPost('tlp'),
                'alamat' => $this->request->getPost('alamat'),
                'foto' => $namafoto,
            ];
            // simpan data
            $simpan = $this->masyarakatmodel->save($data);
            if ($simpan) {
                session()->setFlashdata('pesan', 'Pendaftaran berhasil');
                return redirect()->to('/login');
            }
        }
    }

    // proses login dan set session
    public function prosesLogin()
    {
        // pendefinisian form input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // TENTUKAN RULE VALIDASI
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
            return redirect()->to('/login')->withInput()->with('validation', $validasi);
        } else {
            // jika lolos validasi maka lakukan proses login
            // cek usernme apakah ada
            $query = $this->masyarakatmodel->getWhere(['username' => $username]);
            $usernamecek = $query->getRow();
            if ($usernamecek) {
                // jika username ada maka cek password
                if (password_verify($password, $usernamecek->password)) {
                    // jika password sbenar dan username ada maka lakukan proses login
                    $setsession = [
                        'nik' => $usernamecek->nik,
                        'nama' => $usernamecek->nama
                    ];
                    // simpan session
                    // LALU BUKA FOLDER APP/FILTER DAN TENTUKAN SESSIONNYA
                    session()->set($setsession);
                    return redirect()->to('/lapor');
                } else {
                    // jika password salah
                    session()->setFlashdata('pesan', 'Maaf Password salah');
                    return redirect()->to('/login');
                }
            } else {
                // juka username tidak terdaftar
                session()->setFlashdata('pesan', 'Maaf Username tidak terdaftar');
                return redirect()->to('/login');
            }
        }
    }

    // proses logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
