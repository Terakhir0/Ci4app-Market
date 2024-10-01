<?php

namespace App\Controllers;

use BackedEnum;

class Order extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $userModel;
    protected $keranjangModel;
    protected $riwayatModel;
    protected $orderModel;
    protected $helpers = ['form'];



    public function index($id)
    {


       
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
            if(!validation_show_error('uang')){
                
            $idp =  $this->request->getVar('idp');
            $jumlah = $this->request->getVar('jumlah_beli');
            $key = (validation_show_error('uang')? old('key') : $this->request->getVar('key'));
        
            for($x = 0; $x < $val['isi']; $x++)
            {
                // dd($jumlah);
                $this->keranjangModel->save([
                    'chart_id'   => $key[$x],
                    'produkC_id' => $idp[$x],
                    'jumlah'    => $jumlah[$x],
                ]);
          
            }
        }

        $order = $this->keranjangModel->join('tb_produk', 'produk_id = produkC_id', 'inner')->where('user_id', $id);
       
        
            
            $data = [
                'title'  => 'Home',
                'user'   => $user,
                'order'  => $order->paginate(10, 'keranjang'),
                'val'    => $val['isi'],
                
            ];
        
        

     


        return view('order/index', $data);
    }


    public function beli($id)
    {
        $user = $this->userModel->getUser(session()->get('id'));

        $order = $this->produkModel->where(['produk_id' => $id])->first();

        $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = ".session()->get('id')." ");
        $val = $count->getRowArray();
        
        $jumlah = ( validation_show_error('uang')? old('jumlah_beli') : $this->request->getVar('jumlah_beli'));

        // dd($jumlah);
        
        $data = [
                'user'   => $user,
                'produk'  => $order,
                'jumlah' => $jumlah[0],
                'val'   => $val['isi']
        ];

        return view('order/beli', $data);


    }



    public function beli_keranjang()
        {

            if(!$this->validate([
                'uang' => [
                    'rules' => 'greater_than_equal_to['. $this->request->getPost('total') .']',
                    'errors' => [
                        'greater_than_equal_to' => 'Uang anda tidak cukup',
                    ]
                ]
            ])) 
            {
                echo '<script>alert("Uang anda tidak cukup!")</script>';
                return redirect()->back()->withInput();
            } 


            $id = session()->get('id');
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
            $k = $val['isi'];
            $ido = $this->request->getVar('ido');
            $harga_total = $this->request->getVar('uang') - $this->request->getVar('total');
            $stok = $this->request->getPost('stok');

            $jumlah =  $this->request->getVar('jumlah_beli');
            // dd($this->request->getVar(['stok']));

            
            // if($harga_total < 0)
            // {
                // session()->setFlashdata('uang_tidak_cukup', 'Keranjang sudah penuh');
                // echo '<script>alert("Uang anda tidak cukup")</script>';
                // return redirect()->to('/order/5')->withInput();
            // }
            // dd($harga_total);

            if($stok == 0)
            {
                return redirect()->to('/');
            }

            $this->userModel->save([
                'id'    => $id,
                'uang'  => $harga_total,
            ]);
            $sisa_stok = [];

            foreach($stok as $key => $val)
            {
                $sisa_stok[$key] = $val - $jumlah[$key];
            };


            for($x = 0; $x < $k; $x++)
            {


              

                $this->produkModel->save([
                    'produk_id' => $ido[$x],
                    'produk_stok' => $sisa_stok[$x],
                ]);

                $this->riwayatModel->save([
                    'produkr_id' => $ido[$x],
                    'user_id'    => session()->get('id'),
                    'produk_jumlah'  => $jumlah[$x],
                ]);


            }
            echo '<script>alert("Barang berhasil di beli!")</script>';

            $this->keranjangModel->where('user_id', session()->get('id'))->delete();    

            session()->setFlashdata('berhasil_beli', 'berhasil');
            session()->setFlashdata('anjing', 'kontol');

            return redirect()->to('/');

            
        }
}