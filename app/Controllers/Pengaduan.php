<?php

namespace App\Controllers;

use App\Models\MasyarakatModel;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use Mpdf\Mpdf;

class Pengaduan extends BaseController
{

    public function __construct()
    {
        $this->pengaduanmodel = new PengaduanModel();
        $this->masyarakatmodel = new MasyarakatModel();
        $this->tanggapanmodel = new TanggapanModel();
    }

    // MENAMPILKAN HALAMAN  PENGADUAN
    public function index()
    {
        $data = [
            'judul_web' => 'Pengaduan',
            // MENAMPILKAN SEMUA PENGADUAN DENGAN QUERY BUILDER
            'pengaduan' => $this->pengaduanmodel->getAll(),
        ];
        return view('pengaduan/index', $data);
    }

    // MENAMPILKAN DETAIL PENGADUAN DAN TANGGAPAN
    public function view($id)
    {
        $data = [
            'judul_web' => 'Detail Pengaduan',
            // MENAMPILKAN PENGADUAN BERDASARKAN ID PENGADUAN DENGAN QUERY BUILDER
            'pengaduan' =>  $this->pengaduanmodel->getById($id),
            // MENAMPILKAN TANGGAPAN BERDASARKAN ID PENGADUAN DENGAN QUERY BUIDER
            'tanggapan' =>  $this->pengaduanmodel->getTanggapanById($id)
        ];
        return view('pengaduan/view', $data);
    }

    // PROSES PEMBERIAN TANGGAPAN DAN INSERT DATA TANGGAPAN SERTA PERUBAHAN STATUS PENGADUAN
    public function post()
    {
        // TENTUKAN ID PENGADUAN
        $id = $this->request->getPost('id_pengaduan');
        // TENTUKAN DATA YANG AKAN DISIMPAN DALAM DATA PENGADUAN BERDASARKAN FORM ISIAN
        $data = [
            'id_pengaduan' => $id,
            'tanggapan' => $this->request->getPost('tanggapan'),
            'tgl_tanggapan' => date('y-m-d'),
            'id_petugas' => session()->id_petugas
        ];
        // JIKA YANG DITEKAN TOMBOL TEREIMA
        if (isset($_POST['terima'])) {
            $tanggapan = [
                'status' => 'selesai'
            ];
            // UBAH STATUS PENGADUAN
            $this->pengaduanmodel->update($id, $tanggapan);
            // JIKA YANG DITEKAN TOLAK
        } elseif (isset($_POST['tolak'])) {
            $tanggapan = [
                'status' => 'ditolak'
            ];
            // UBAH STATUS PENGADUAN
            $this->pengaduanmodel->update($id, $tanggapan);
        }

        // SIMPAN TANGGAPAN
        $simpan = $this->tanggapanmodel->save($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Tanggapan berhasil dikirim');
            return redirect()->to('/pengaduan');
        }
    }

    // PRINT PENGADUAN BERDASARKAN ID
    public function print($id)
    {
        $mpdf = new Mpdf();

        $data = [
            'pengaduan' =>  $this->pengaduanmodel->getById($id),
            'tanggapan' =>  $this->pengaduanmodel->getTanggapanById($id)
        ];

        $view = view('pengaduan/print', $data);
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
}
