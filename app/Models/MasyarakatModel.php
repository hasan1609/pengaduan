<?php

namespace App\Models;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'nik';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik', 'nama', 'username', 'password', 'email', 'tlp', 'alamat', 'foto'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // QUERY MENAMPILKAN DATA DARI TABEL MASYARAKAT BERDASARKAN NIK
    function getById($id)
    {
        $builder = $this->db->table('user');
        $query = $builder->getWhere(['nik' => $id]);
        return $query->getResult();
    }

    function getCount()
    {
        $builder = $this->db->table('user');
        $query = $builder->countAll();
        return $query;
    }
}
