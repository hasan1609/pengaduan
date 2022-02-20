<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->adminmodel = new AdminModel();
    }

    // MENAMPILKAN HALAMAN PETUGAS
    public function index()
    {
        // MENAMPILKAN DATA PETUGAS
        $admin = $this->adminmodel->getAll(1);
        $data = [
            'judul_web' => 'Petugas',
            'admin' => $admin
        ];
        return view('petugas/index', $data);
    }

    // HAPUS PETUGAS
    public function delete($id)
    {
        $this->adminmodel->delete($id);
        session()->setFlashdata('pesan', 'Dihapus');
        return redirect()->to('/petugas');
    }

    // MENAMPILKAN HALAMAN TAMBAH DATA PETUGAS
    public function add()
    {
        $data = [
            'judul_web' => 'Tambah Petugas',
            'validation' => \Config\Services::validation()
        ];

        return view('petugas/add', $data);
    }

    // PROSES TAMBAH DATA PETUGAS
    public function create()
    {
        // TENTUKAN RULE VALIDASI
        $validasi = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah digunakan',
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
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 8 karakter'
                ]
            ]
        ]);
        // LAKUKAN PROSES VALIDASI
        if (!$validasi) {
            $val = \Config\Services::validation();
            return redirect()->to('/petugas')->withInput()->with('validation', $val);
        } else {
            // JIKA LOLOS VALIDASI
            // LAKUKAN PROSES SIMPAN DATA BERDASARKAN FORMINPUT DAN DATABASE 
            $data = [
                'nama_petugas' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'id_level' => 1,
                'tlp' => $this->request->getPost('tlp'),
            ];
            // SIMPAN DATA
            $simpan = $this->adminmodel->save($data);
            if ($simpan) {
                session()->setFlashdata('pesan', 'Pendaftaran berhasil');
                return redirect()->to('/petugas');
            }
        }
    }
}
