<?php

namespace App\Controllers;

use BackedEnum;

class Keranjang extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $userModel;
    protected $keranjangModel;
    protected $helpers = ['form'];



    public function index($id)
    {

        // $array = [13, 12, 19];
        // $test = $this->keranjangModel->query(" FROM keranjang WHERE user_id = $id");
        // $ss = $test->getResult();
        // if(in_array($ss, $array)){
        //     dd($ss);
        // }

            // $tt = $this->keranjangModel->where('user_id', $id);
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT produkC_id FROM keranjang WHERE user_id = $id ");
            $val = $count->getResultArray();
          
            // dd($val);
            // $ts = mysqli_fetch_array($this->keranjangModel->query("SELECT produkC_id FROM keranjang WHERE user_id = $id "));
            // $tesw = $this->keranjangModel->where(['user_id' => $id])->findColumn('produkC_id');
            // dd($tesw);
            // for($x = 0; $x < count($val); $x++ ){
            //     $anjing = [];    
            //     $anjing = $tesw['produkC_id'][$x];

            //     print_r($anjing);
            // }

            // foreach($tesw as $arr){

            //     if(!in_array($arr, $array)){
            //        print_r($arr);
            //     }
            // }
        
      

        $chart = $this->keranjangModel->join('tb_produk', 'produk_id = produkC_id', 'inner')->where('user_id', $id);
       
            
            $data = [
                'title'  => 'Home',
                'user'   => $user,
                'chart'  => $chart->paginate(10, 'keranjang'),
                'val'    => count($val),
                'keranjang' => $this->keranjangModel,
                    ];
        
        

     


        return view('keranjang/index', $data);
    }



    // public function guest()
    // {
      
    //     if(session('cart') != 0)
    //     {

    //         // for($i = 0; $i < count(session('produk_id')); $i++)
    //         // {
    //         //     $chart = $this->keranjangModel->where('produkC_id', session()->get('produk_id'[$i]));
    //         // }

    //         $chart = session()->get('cart');
    //         // $chart = $this->keranjangModel->where('produkC_id', session('cart', 'id'));
    //         // dd($_SESSION['cart']);
    //         $val2 = count(session('cart'));
        
    //     } else
        
    //     {

    //         $chart = '';
    //         $val2 = '';
          
    //     }


        
    //     $data = [
    //         'title'  => 'Home',
    //         'produk' => $this->produkModel->findAll(),
    //         'genre'  => $this->genreModel->findAll(),
    //         'chart'  => $chart,
    //         'val2'   => $val2,
            
    //     ];
     


    //     return view('keranjang/guest', $data);
    // }


    
    public function hapus($id)
    {

            $this->keranjangModel->where('produkC_id', $id)->delete();

            return redirect()->back();
    }



    public function save()
    {
        $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = ".session()->get('id')." ");
        $val = $count->getRowArray();

        if($val['isi'] >= 10)
        {
            session()->setFlashdata('keranjang_penuh', 'Keranjang sudah penuh');
            return redirect()->back();

        }
        
        if(!$this->validate([
            'idc' => [
                'rules' => 'is_unique[keranjang.produkC_id]',
                'errors' =>  'Produk sudah ada di keranjang',
                
                
                
            ]
        ])){

        return redirect()->back()->withInput();
        }
    
        $this->keranjangModel->save([
            'produkC_id' => $this->request->getVar('idc'),
            'user_id'    => session()->get('id'),
            'jumlah'     => $this->request->getVar('jumlah'),
        ]);


        session()->setFlashdata('keranjang1', 'Produk berhasil dimasukkan kedalam keranjang');
        return redirect()->back();
        
    }
    public function saveCariGenre()
    {
        $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = ".session()->get('id')." ");
        $val = $count->getRowArray();
        $currentPage = $this->request->getVar('current');


        if($val['isi'] >= 10)
        {
            session()->setFlashdata('keranjang_penuh', 'Keranjang sudah penuh');
            return redirect()->back();

        }
        
        if(!$this->validate([
            'idc' => [
                'rules' => 'is_unique[keranjang.produkC_id]',
                'errors' =>  'Produk sudah ada di keranjang',
                
                
                
            ]
        ])){

        return redirect()->back()->withInput();
        }
        $keywords = $this->request->getVar('keywords');
    
        $this->keranjangModel->save([
            'produkC_id' => $this->request->getVar('idc'),
            'user_id'    => session()->get('id'),
            'jumlah'     => $this->request->getVar('jumlah'),
        ]);


        session()->setFlashdata('keranjang1', 'Produk berhasil dimasukkan kedalam keranjang');
        return redirect()->to('/cari/genre/'.$keywords.'?page_tb_produk='.$currentPage);
        
    }


    // public function guest_save()
    //  {
       

    //     if(isset($_SESSION['cart'])){
    //     $item_array_id = array_column(session('cart'), 'id');
    //     if(in_array($this->request->getVar('idc'), $item_array_id)){
    //         session()->setFlashdata('guest_gagal', 'Produk sudah ada di dalam keranjang!');
    //         // return redirect()->back();

    //     }else{
    //         $keranjang = [
    //             'id' => $this->request->getVar('idc'),
    //             'nama' => $this->request->getVar('guest_nama'),
    //             'gambar' => $this->request->getVar('guest_gambar'),
    //             'harga' => $this->request->getVar('guest_harga'),
    //             'jumlah' => $this->request->getVar('jumlah'),
    //         ];

    //        $_SESSION['cart'][] = $keranjang;
    //        session()->setFlashdata('keranjang2', 'Produk berhasil dimasukkan kedalam keranjang');


    //     } 

    //     }    else {
    //         $keranjang = [
    //             'id' => $this->request->getVar('idc'),
    //             'nama' => $this->request->getVar('guest_nama'),
    //             'gambar' => $this->request->getVar('guest_gambar'),
    //             'harga' => $this->request->getVar('guest_harga'),
    //             'jumlah' => $this->request->getVar('jumlah'),
    //         ];
    //         $_SESSION['cart'][] = $keranjang;
    //         session()->setFlashdata('keranjang2', 'Produk berhasil dimasukkan kedalam keranjang');

    //     }


    //     return redirect()->back();
       
    // }


//     public function guest_delete($id)
//     {
      

//         $cart = $_SESSION['cart'];

//             $k = array_filter($cart, function ($var) use ($id){
//                 return ($var['id']==$id);
//             });

//             foreach($k as $key => $value){
//                 unset($_SESSION['cart'][$key]);
//             }

//             // $_SESSION['cart'] = array_values($_SESSION['cart']);
//             // dd($_SESSION['cart']);

//             if(count(session('cart')) < 1)
//             {
//                 session()->remove('cart');
//             }
//             return redirect()->to('/keranjang/guest');
      
//    }

   public function reset()
   {
    // if(session('cart'))
    // {
    //     session()->remove('cart');
    // }
    // else{
    //     $this->keranjangModel->where('user_id', session()->get('id'))->delete();

    //     return redirect()->back();
    // }
        // dd(session()->get('id'));


    $this->keranjangModel->where('user_id', session()->get('id'))->delete();    
    return redirect()->back();
    }


    public function pesan($id)
    {
        $this->orderModel->save([
            'produkO_id' => $this->request->getVar('idc'),
            'user_id'    => $id,
            'jumlah'     => $this->request->getVar('jumlah'),
        ]);


        return redirect()->to('/order/'.$id);
        
    }
    
}