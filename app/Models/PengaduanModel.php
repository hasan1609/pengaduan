<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengaduan';
    protected $primaryKey       = 'id_pengaduan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_pengaduan', 'nik', 'judul', 'isi', 'foto', 'status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // menampilkan data pengaduan
    function getAll()
    {
        $builder = $this->db->table('pengaduan');
        $builder->join('user', 'user.nik = pengaduan.nik');
        $query = $builder->get();
        return $query->getResult();
    }

    // QUERY MENAMPILKAN DATA PENGADUAN DARI TABEL PENGADUAN BERDASARKAN ID
    function getById($id)
    {
        $builder = $this->db->table('pengaduan');
        $builder->join('user', 'user.nik = pengaduan.nik');
        $query = $builder->getWhere(['pengaduan.id_pengaduan' => $id]);
        return $query->getResult();
    }
    // QUERY MENAMPILKAN DATA DARI TABEL TANGGAPAN BERDASARKAN IDTANGGAPAN SERTA DENGAN JOIN TABEL PENGADUAN
    function getTanggapanById($id)
    {
        $builder = $this->db->table('tanggapan');
        $builder->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan');
        $builder->join('admin', 'admin.id_petugas = tanggapan.id_petugas');
        $query = $builder->getWhere(['tanggapan.id_pengaduan' => $id]);
        return $query->getResult();
    }

    // QUERY MENAMPILKAN DATA DARI TABEL PENGADUAN BERDASARKAN NIK
    function getPengaduan($nik)
    {
        $builder = $this->db->table('pengaduan');
        $query = $builder->getWhere(['nik' => $nik]);
        return $query->getResult();
    }

    // MENGHITUNG JUMPLAH PENGADUAN
    function getCountPengaduan()
    {
        $builder = $this->db->table('pengaduan');
        $count = $builder->countAll();
        return $count;
    }

    // MENGHITUNG JUUMLAH PENGADUAN YANG DITERIMA/TERVERIFIKASI
    function getCountPengaduanVerif($status)
    {
        $builder = $this->db->table('pengaduan');
        $query = $builder->where(['status' => $status]);
        $count = $query->countAllResults();
        return $count;
    }
}
