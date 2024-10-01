<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model {
    protected $table = 'riwayat';
    // protected $useTimestamps = true;
    protected $primaryKey = 'riwayat_id';
    protected $allowedFields = ['produkr_id', 'user_id', 'produk_jumlah'];


    public function getRiwayat($id = false)
    {
        if($id == false)
        {
            return $this->findAll();
        }

        return $this->where('user_id', $id);
    }

   
}