<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $keranjangModel;
    protected $userModel;
    protected $helpers = ['form'];


    public function index()
    {

        $currentPage = $this->request->getVar('page_tb_produk') ? $this->request->getVar('page_tb_produk')  : 1 ;


        if(session('log') == true)
        {
            $id = session()->get('id');
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
            $total = $val['isi'];
        
        
        } else{
            $user = '';
            $total = '';
        }
        
        if(session()->get('cart')){
            $val2 = count(session('cart'));

        } else{
            $val2 = '';
        }


        $data = [
            'title'  => 'Home',
            'produk' => $this->produkModel->paginate(15, 'tb_produk'),
            'genre'  => $this->genreModel->findAll(),
            'user'   => $user,
            'pager'  => $this->produkModel->pager,
            'currentPage' => $currentPage,
            'val'   => $total,
            'val2' => $val2,
            
        ];


        return view('home/index', $data);
    }

}