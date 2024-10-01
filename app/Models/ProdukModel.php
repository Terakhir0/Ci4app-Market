<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model {
    protected $table = 'tb_produk';
    protected $primaryKey = 'produk_id';
    protected $allowedFields = ['produk_gambar', 'produk_nama', 'produk_penulis', 'produk_deskripsi', 'produk_harga', 'produk_stok'];

    public function getProduk($id = false)
    {
        if($id == false){
            return $this->findAll();
        } 
        return $this->where(['produk_id' => $id])->first();
    }

    public function cleaning($string) {
        $string = str_replace(' ', '-', $string); // ganti spasi dengan tanda baca "-".
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens(tanda baca) with single one.
     }

    public function search_produk($keyword)
    {
        $clean = $this->cleaning($keyword);
        if(strpos($clean, "-") > 0){
            $cari = explode("-", $clean);
        }else{
            $cari = $clean;
        }


        if(is_array($cari)){
            foreach($cari as $data){
                $search = $this->table('tb_produk')->like('produk_nama', $data)->orLike('produk_genres', $data);

            }
        } else {
            $search = $this->table('tb_produk')->like('produk_nama', $cari)->orLike('produk_genres', $cari);

        }
        
        return $search;
    }

    public function multiSearchGenre($search){
        $results = array();
        $dataAll = array();
        foreach($this->findAll() as $data){
            $array = [
                'id' => $data['produk_id'],
                'genres' => explode(", ", $data['produk_genres']),
            ];

            $dataAll[] = $array;
        }

        foreach($dataAll as $items){
            if(array_diff($search, $items['genres']) === array()){
                $results[] = $items['id'];
            }
        }

        return $results;
    }
}