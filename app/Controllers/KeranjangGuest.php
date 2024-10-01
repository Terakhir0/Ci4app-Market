<?php

namespace App\Controllers;

use BackedEnum;

class KeranjangGuest extends BaseController
{
    protected $produkModel;
    protected $keranjangModel;
    protected $helpers = ['form'];



    public function index()
    {
      
        // $cart = session('cart');
        // $j_cart = count($cart);
        
        // $column = array_column($cart, 'id');
        
        // $count = $this->keranjangModel->query("SELECT produkC_id FROM keranjang WHERE user_id = ".session()->get('id')." ");
        // $val = $count->getResultArray();
        // dd($val);
        
        // $arr = $this->keranjangModel->select('produkC_id')->asArray()->where(['user_id' => session()->get('id')])->findColumn('produkC_id');

        // $isi_cart = count($val);
     
        // $insert_id = array_diff($column, $arr);

        $arrays = ["1", "2"];
        // $jumlah = array_column($cart, 'jumlah');
        // dd(count($arrays));
        // $total = $isi_cart + count($insert_id); 
        // dd($isi_cart);
        // $tess = 10 - count($arrays);

        // $tee = count($arrays);
        // while($tee < 4){
        //     echo $arrays;
        //     if($tee == 10){
        //         break;
        //     }
        //     $tee++;
        // }

        // for($x = 0; $x < 2; $x++ ){
        //     echo $arrays[$x];
        // }

        // dd($insert_id);
        
        // do{
        //     dd($arrays[$x]);
            // $this->keranjangModel->save([
            //     'produkC_id' => $insert_id[$x],
            //     'user_id'    => session()->get('id'),
            //     'jumlah'     => $jumlah[$x],
            // ]);
        // }while();
        
        if(session('cart') != 0)
        {

            // for($i = 0; $i < count(session('produk_id')); $i++)
            // {
            //     $chart = $this->keranjangModel->where('produkC_id', session()->get('produk_id'[$i]));
            // }

            $chart = session()->get('cart');
            // $chart = $this->keranjangModel->where('produkC_id', session('cart', 'id'));
            // dd($_SESSION['cart']);
            $val2 = count(session('cart'));
        
        } else
        
        {

            $chart = '';
            $val2 = '';
          
        }


        
        $data = [
            'title'  => 'Home',
            'produk' => $this->produkModel->findAll(),
            'genre'  => $this->genreModel->findAll(),
            'chart'  => $chart,
            'val2'   => $val2,
            
        ];
     


        return view('keranjangGuest/index', $data);
    }



    public function guest_save()
     {
       

        if(isset($_SESSION['cart'])){
        $item_array_id = array_column(session('cart'), 'id');
        if(in_array($this->request->getVar('idc'), $item_array_id)){
            session()->setFlashdata('guest_gagal', 'Produk sudah ada di dalam keranjang!');
            // return redirect()->back();

        }else{
            $keranjang = [
                'id' => $this->request->getVar('idc'),
                'nama' => $this->request->getVar('guest_nama'),
                'gambar' => $this->request->getVar('guest_gambar'),
                'harga' => $this->request->getVar('guest_harga'),
                'jumlah' => $this->request->getVar('jumlah'),
            ];

           $_SESSION['cart'][] = $keranjang;
           session()->setFlashdata('keranjang2', 'Produk berhasil dimasukkan kedalam keranjang');


        } 

        }    else {
            $keranjang = [
                'id' => $this->request->getVar('idc'),
                'nama' => $this->request->getVar('guest_nama'),
                'gambar' => $this->request->getVar('guest_gambar'),
                'harga' => $this->request->getVar('guest_harga'),
                'jumlah' => $this->request->getVar('jumlah'),
            ];
            $_SESSION['cart'][] = $keranjang;
            session()->setFlashdata('keranjang2', 'Produk berhasil dimasukkan kedalam keranjang');

        }


        return redirect()->back();
       
    }
    public function guest_saveCariGenre()
     {
       
        $keywords = $this->request->getVar('keywords');
        $currentPage = $this->request->getVar('current');


        if(isset($_SESSION['cart'])){
        $item_array_id = array_column(session('cart'), 'id');
        if(in_array($this->request->getVar('idc'), $item_array_id)){
            session()->setFlashdata('guest_gagal', 'Produk sudah ada di dalam keranjang!');
            // return redirect()->back();

        }else{
            $keranjang = [
                'id' => $this->request->getVar('idc'),
                'nama' => $this->request->getVar('guest_nama'),
                'gambar' => $this->request->getVar('guest_gambar'),
                'harga' => $this->request->getVar('guest_harga'),
                'jumlah' => $this->request->getVar('jumlah'),
            ];

           $_SESSION['cart'][] = $keranjang;
           session()->setFlashdata('keranjang2', 'Produk berhasil dimasukkan kedalam keranjang');


        } 

        }    else {
            $keranjang = [
                'id' => $this->request->getVar('idc'),
                'nama' => $this->request->getVar('guest_nama'),
                'gambar' => $this->request->getVar('guest_gambar'),
                'harga' => $this->request->getVar('guest_harga'),
                'jumlah' => $this->request->getVar('jumlah'),
            ];
            $_SESSION['cart'][] = $keranjang;
            session()->setFlashdata('keranjang2', 'Produk berhasil dimasukkan kedalam keranjang');

        }


        return redirect()->to('cari/genre/'.$keywords.'?page_tb_produk='.$currentPage);
       
    }


    public function guest_delete($id)
    {
      

        $cart = $_SESSION['cart'];

            $k = array_filter($cart, function ($var) use ($id){
                return ($var['id']==$id);
            });

            foreach($k as $key => $value){
                unset($_SESSION['cart'][$key]);
            }

            // $_SESSION['cart'] = array_values($_SESSION['cart']);
            // dd($_SESSION['cart']);

            if(count(session('cart')) < 1)
            {
                session()->remove('cart');
            }
            return redirect()->back();
      
   }

   public function guest_reset()
   {
    if(session('cart'))
    {
        session()->remove('cart');
        return redirect()->back();
    }
    else{
        echo "<script>alert('Keranjang sudah kosong!')";

        return redirect()->back();
    }

    }
    
}