<?php

namespace App\Controllers;

class Single extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $userModel;
    protected $keranjangModel;
    protected $helpers = ['form'];


    public function index($idp)
    {

        
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
            'title'   => 'Single',
            'produk'  => $this->produkModel->getProduk($idp),
            'produk2'  => $this->produkModel,
            'genre1'  => $this->genreModel,
            // 'genre2'  => $this->genre2Model,
            'user'    => $user,
            'idp'      => $idp,
            'val'     => $total,   
            'val2'    => $val2,
            
        ];


        return view('single/index', $data);
    }

}