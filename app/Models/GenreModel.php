<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model {
    protected $table = 'tb_genre';
    protected $primaryKey = 'genre_id';
    protected $allowedFields = ['genre_nama'];

    public function getGenre($id = false)
    {
        if($id == false){
            return $this->findAll();
        } 
        return $this->where(['genre_id' => $id])->first();
    }

    public function search_genre($keyword)
    {
        return $this->where('genre_nama', $keyword);
    }

}