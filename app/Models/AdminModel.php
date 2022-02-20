<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id_petugas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_petugas', 'username', 'password', 'tlp', 'id_level'];

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

    // QUERY MENAMPILKAN DATA DARI TABEL ADMIN BERDASARKAN LEVEL
    function getAll($id_level)
    {
        $builder = $this->db->table('admin');
        $query = $builder->getWhere(['id_level' => $id_level]);
        return $query->getResult();
    }
    function getCountAdmin($id_level)
    {
        $builder = $this->db->table('admin');
        $query = $builder->where(['id_level' => $id_level]);
        $count = $query->countAllResults();
        return $count;
    }
}
