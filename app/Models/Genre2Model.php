<?php

namespace App\Models;

use CodeIgniter\Model;

class Genre2Model extends Model {
    protected $table = 'genre';
    protected $allowedFields = [ 'genreg_id', 'produkg_id'];

    public function getGenre2($id = false)
    {
        if($id == false){
            return $this->findAll();
        } 
        return $this->where(['genreg_id' => $id])->first();
    }
}