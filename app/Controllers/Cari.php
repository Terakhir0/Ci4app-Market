<?php

namespace App\Controllers;

class Cari extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $genre2Model;
    protected $userModel;
    protected $helpers = ['form'];

    public function index()
    {
        $currentPage = $this->request->getVar('page_tb_produk') ? $this->request->getVar('page_tb_produk')  : 1 ;

        $keyword = $this->request->getVar('keyword');

        
        if($keyword)
        {
            $produk = $this->produkModel->search_produk($keyword);
        }else{
            $produk = $this->produkModel;
        }

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
            'produk2' => $this->produkModel->search_produk($keyword),
            'pager'  => $this->produkModel->pager,
            'currentPage' => $currentPage,
            'genre1'  => $this->genreModel->orderBy('genre_nama', 'ASC')->findAll(),
            // 'genre2'  => $this->genre2Model,
            'user'   => $user,
            'keyword' => $keyword,
            'val'     => $total,  
            'val2'    => $val2,  
            
        ];


        return view('cari/index', $data);
    }

    public function genre($keyword_genre)
    {
        $currentPage = $this->request->getVar('page_tb_produk') ? $this->request->getVar('page_tb_produk')  : 1 ;

        $keywords = $keyword_genre;
        
      
        if($keywords)
        {
            $produk = $this->produkModel->join('genre', 'produkg_id = produk_id', 'inner')->join('tb_genre', 'genre_id = genreg_id', 'inner')->where('genre_nama', $keywords);
        }else{
            $produk = $this->produkModel;
        }

        
        
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
            'produk2' => $this->produkModel,
            'pager'  => $this->produkModel->pager,
            'currentPage' => $currentPage,
            'genre1'  => $this->genreModel->orderBy('genre_nama', 'ASC')->findAll(),
            // 'genre2'  => $this->genre2Model,
            'user'   => $user,
            'keyword_genre' => $keywords,
            'val'   => $total,
            'val2'  => $val2,
            
        ];



        return view('cari/genre', $data);
    }

   

}