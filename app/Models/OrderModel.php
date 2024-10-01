<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model {

        protected $table = 'order_user';
        protected $primaryKey = 'order_id';
        protected $allowedFields = ['produkO_id', 'user_order'];


        public function getOrder($id = false)
        {
                if($id == false)
                {
                        return $this->findAll();
                }
                return $this->where(['user_id' => $id]);
        }
    
}