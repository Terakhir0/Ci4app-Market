<?php

namespace App\Controllers;

class Genres extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $genre2Model;
    protected $userModel;
    protected $helpers = ['form'];
    

public function index()
    {
        $currentPage = $this->request->getVar('page_tb_produk') ? $this->request->getVar('page_tb_produk')  : 1 ;

        $keywords = $this->request->getVar('g');


        // $results = array();
        // dd($keywords);

       

            // $key = implode('+', $keywords);

            // $produk = $this->produkModel->join('genre', 'produkg_id = produk_id', 'inner')->join('tb_genre', 'genre_id = genreg_id', 'inner')->orderBy('produk_id', 'ASC');

            // $produk->whereIn('genre_id', $keywords)->first();
                // $produk = $this->produkModel->orderBy('produk_id', 'ASC');

            
            // for($x = 0; $x < count($keywords); $x++){ 
            //     $where = ['genre_nama' => $keywords[$x]];
            // };
            // $produk->where($where);
            
                $results = $this->produkModel->multiSearchGenre($keywords);
                // $convertResults = implode(", ", $results);
                // $all = array('produk_id' => [$results]);
                if($results == false){
                    $results = ["false"];
                };
                $produk = $this->produkModel->whereIn('produk_id', $results)->orderBy('produk_id', 'ASC');

            // for($x = 0; $x < count($keywords); $x++){ 
            //     $produk = $this->produkModel->query("SELECT *, GROUP_CONCAT(genre_nama ORDER BY genre_nama SEPARATOR ' , ') AS genres, GROUP_CONCAT(genre_id ORDER BY genre_nama SEPARATOR ', ') AS genres_id FROM tb_produk INNER JOIN genre ON produkg_id=produk_id INNER JOIN tb_genre ON genre_id=genreg_id WHERE produk_stok > 0 AND genre_id = $keywords[$x] GROUP BY produk_nama ORDER BY genre_id");               
            //  };

          

            // $produk->getResult();
        
        
        
            if(session('log') == true)
            {
                $id = session()->get('id');
                $user = $this->userModel->getUser($id);
                $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
                $val = $count->getRowArray();
                $total = $val['isi'];
                $val2 = '';
            
            
            } else{
                $user = '';
                $total = '';

                  
                if(session()->get('cart')){
                    $val2 = count(session('cart'));

                } else{
                    $val2 = '';
                }

            }
    

        $data = [
            'title'  => 'Cari',
            'produk' => $produk->paginate(10, 'tb_produk'),
            'produk2' => $produk,
            'pager'  => $this->produkModel->pager,
            'currentPage' => $currentPage,
            'genre1'  => $this->genreModel->orderBy('genre_nama', 'ASC')->findAll(),
            'genre2'  => $this->genre2Model,
            'user'   => $user,
            'keywords' => $keywords,
            'val'   => $total,
            'val2'      => $val2,
            
        ];

        // dd($data['produk']);


        return view('genres/index', $data);
    }

}