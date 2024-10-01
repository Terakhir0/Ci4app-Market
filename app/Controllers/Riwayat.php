<?php

namespace App\Controllers;

class Riwayat extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $userModel;
    protected $riwayatModel;
    protected $helpers = ['form'];


    public function index($id)
    {
            $currentPage = $this->request->getVar('page_riwayat') ? $this->request->getVar('page_riwayat')  : 1 ;
            $keyword = $this->request->getVar('keyword');

            
                $user = $this->userModel->getUser($id);
                $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
                $val = $count->getRowArray();
            
        
                $riwayat = $this->riwayatModel->join('tb_produk', 'produkr_id = produk_id', 'inner')->where('user_id', $id)->orderby('tanggal_beli', 'DESC');


        
        if($keyword)
        {
            $riwayat->like('produk_nama', $keyword)->orLike('tanggal_beli', $keyword)->orLike('produk_harga', $keyword);
        }
        
        $data = [
            'title'  => 'Home',
            'produk' => $this->produkModel->findAll(),
            'genre'  => $this->genreModel->findAll(),
            'user'   => $user,
            'id'     => $user['id'],   
            'riwayat' => $riwayat->paginate(10, 'riwayat'),
            'pager'  => $this->riwayatModel->pager,
            'currentPage' => $currentPage,
            'val'    => $val['isi'],
            
        ];


        return view('riwayat/index', $data);
    }

}