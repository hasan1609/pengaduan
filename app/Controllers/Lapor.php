<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;

class Lapor extends BaseController
{
    public function __construct()
    {
        $this->pengaduanmodel = new PengaduanModel();
        $this->masyarakatmodel = new MasyarakatModel();
    }

    // menampilkan halaman lapor user
    public function index()
    {
        if (session()->nik == '') {
            return redirect()->to('/login');
        }
        // UNTUK MENAMPILKAN DATA PENGADUAN DENGAN QUERY BUILDER
        $pengaduan = $this->pengaduanmodel->getPengaduan(session()->nik);
        // UNTUK MENAMPILKAN DATA PROFIL USER DENGAN QUERY BUILDER
        $profil = $this->masyarakatmodel->getById(session()->nik);
        $data = [
            'judul_web' => 'Lapor',
            'pengaduan' => $pengaduan,
            'prof' => $profil
        ];
        return view('lapor/index', $data);
    }

    // menampilkan form tambah pengaduan 
    public function add()
    {
        if (session()->nik == '') {
            return redirect()->to('/login');
        }
        // UNTUK MENAMPILKAN DATA PROFIL USER DENGAN QUERY BUILDER
        $profil = $this->masyarakatmodel->getById(session()->nik);
        $data = [
            'judul_web' => 'Lapor',
            'prof' => $profil,
            'validation' => \Config\Services::validation()
        ];
        return view('lapor/add', $data);
    }

    // prosessimpan data pengaduan
    public function create()
    {
        if (session()->nik == '') {
            return redirect()->to('/login');
        }
        // TENTUKAN RULE DARI VALIDASI FORM
        $validasi = $this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,5024]|is_image[foto]|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/JPEG,image/png,image/PNG,]',
                'errors' => [
                    'uploaded' => 'Harap masukkan foto terlebih dahulu',
                    'max_size' => 'Gambar Maksimal 5MB',
                    'is_image' => 'Harap pilih gambar',
                    'mime_in' => 'Format gambar hanya JPG, JPEG, PNG'
                ]
            ],
            'ket' => [
                'label' => 'Keterangan',
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} Min 20',
                ]
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'mmax_length' => '{field} maksimal 50 karakter',
                ]
            ],
        ]);
        if (!$validasi) {
            // $val = \Config\Services::validation();
            return redirect()->to('/lapor/add')->withInput();
        } else {
            // ambil foto
            $filefoto = $this->request->getFile('foto');
            // ambil nama file lalu generate
            $namafoto = $filefoto->getRandomName();
            // tetukan folder
            $filefoto->move('images', $namafoto);

            // TENTUKAN DATA YANG AKAN DISIMPAN KE DATABASE
            $data = [
                'tgl_pengaduan' => date('y-m-d'),
                'nik' => session()->nik,
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('ket'),
                'foto' => $namafoto,
                'status' => 'proses',
            ];

            // LAKUKAN PROSES PENYIMPANAN DENGAN MODELLING DATA
            $simpan = $this->pengaduanmodel->save($data);
            if ($simpan) {
                session()->setFlashdata('pesan', 'Laporan berhasil terkirim');
                return redirect()->to('/lapor');
            }
        }
    }

    // menampilkan detail pengaduan
    public function view($id)
    {
        if (session()->nik == '') {
            return redirect()->to('/login');
        }
        // UNTUK MENAMPILKAN DATA PROFIL USER DENGAN QUERY BUILDER
        $profil = $this->masyarakatmodel->getById(session()->nik);
        $data = [
            'judul_web' => 'Detail Laporan',
            'prof' => $profil,
            // MENAMPILKA PENGADUAN BERDASARKAN ID DENGAN QUERY BUILDER
            'pengaduan' => $this->pengaduanmodel->getById($id),
            // MENAMPILKAN TANGGAPAN BERDASARKAN ID PENGADUAN
            'tanggapan' =>  $this->pengaduanmodel->getTanggapanById($id)
        ];
        return view('lapor/view', $data);
    }

    // hapus pengaduan
    public function delete($id)
    {
        if (session()->nik == '') {
            return redirect()->to('/login');
        }
        // CARI ID PENGADUAN YANG AKAN DIHAPUS
        $pengaduan = $this->pengaduanmodel->find($id);
        // HAPUS FILE PADA FOLDER PUBLIC/IMAGE
        unlink('images/' . $pengaduan['foto']);
        // HAPUS DATA PADA DATABASE
        $this->pengaduanmodel->delete($id);
        session()->setFlashdata('pesan', 'Laporan berhasil dihapus');
        return redirect()->to('/lapor');
    }
}
