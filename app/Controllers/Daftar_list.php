<?php

namespace App\Controllers;

class Daftar_list extends BaseController
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

    
            $id = session()->get('id');
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
        
        

        $data = [
            'title'  => 'Daftar List',
            'produk' => $produk->paginate(10, 'tb_produk'),
            // 'produk2' => $this->produkModel,
            'pager'  => $this->produkModel->pager,
            'currentPage' => $currentPage,
            // 'genre'  => $this->genreModel,
            // 'genre2'  => $this->genre2Model,
            'user'   => $user,
            'keyword' => $keyword,
            'val'     => $val['isi'],  
            
        ];


        return view('daftar_list/index', $data);
    }

    public function genre()
    {
       
       
            $id = session()->get('id');
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
        
   
        $data = [
            'title' => 'Genre',
            'genre' => $this->genreModel->findAll(),
            'user'  => $user,
            'val'   => $val['isi'],
        ];

        return view('daftar_list/genre', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'namag' => [
                'rules' => 'required|is_unique[tb_genre.genre_nama',
                'error' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
        ])){
            $this->genreModel->save([
                'genre_nama' => $this->request->getVar('namag'),
            ]);
            
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->back();
        }
    }
}