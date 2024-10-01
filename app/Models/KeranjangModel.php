<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model {

        protected $table = 'keranjang';
        protected $primaryKey = 'chart_id';
        protected $allowedFields = ['produkC_id', 'user_id', 'jumlah'];


        public function getKeranjang($id = false)
        {
                if($id == false)
                {
                        return $this->findAll();
                }
                return $this->where(['user_id' => $id])->first();
        }
    
}