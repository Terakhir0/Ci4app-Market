<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\AlertError;

class Auth extends BaseController
{
   
    protected $userModel;
    protected $keranjangModel;
    protected $helpers = ['form', 'array'];

    public function index()
    {

        if(session()->get('id'))
        {
            return redirect()->back();
        }
        
        $keyword = $this->request->getVar('keyword');
        
          
        if(session()->get('cart')){
            $val2 = count(session('cart'));

        } else{
            $val2 = '';
        }


        $uri = [
          'url'     =>  previous_url(),
          'keyword' => $keyword,
          'val2'    => $val2,
        ];

        return view('auth/index', $uri);
    }

    public function daftar()
    {
          
        if(session()->get('cart')){
            $val2 = count(session('cart'));

        } else{
            $val2 = '';
        }

        $data = [
            'val2' => $val2,
        ];

        return view('auth/daftar', $data);
    }


    public function save()
    {
        if(!$this->validate([
            
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
                    // 'rules' => 'uploaded[sampul]|max_size[sampul,1024]is_image[sampul]|mime_in[sampul,image/jpg,image/png,image/jpeg',
                'errors' => [
                    'is_image' => 'tipe file tidak diizinkan',
                    'mime_in' => 'tipe gambar tidak diizinkan',
            ]
            ],
            'nama' => [
                'rules' => 'required|is_unique[user.nama]',
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ]
                ],
            'email' => [
                'rules' => 'required|is_unique[user.password]',
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'hp' => [
                'rules' => 'required|is_unique[user.hp]',
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ]
                ],
                ]))
                {
                    return redirect()->back()->withInput();
                } 

                $gambarUpload = $this->request->getFile('gambar');
                
                if($gambarUpload->getError() == 4)
                {
                    $namaGambar = 'default.png';
                }
                else
                {
                    $namaGambar = $gambarUpload->getName();
                    $gambarUpload->move('/asset/img-profile', $namaGambar);
                }

                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $this->userModel->save([
                    'gambar'    => $namaGambar,
                    'nama'      => $this->request->getVar('nama'),
                    'username'  => $username,
                    // 'password'  => password_hash($password, PASSWORD_DEFAULT),
                    'password'  => MD5($password),
                    'email'     => $this->request->getVar('email'),
                    'hp'        => $this->request->getVar('hp'),
                    'alamat'    => $this->request->getVar('alamat'),
                    'uang'      => $this->request->getVar('uang'),
                ]);

                $user = $this->userModel->where('username', $username)->first();

                $dataUser = [
                    'id'        => $user['id'],
                    'gambar'    => $user['gambar'],
                    'nama'      => $user['nama'],
                    'username'  => $user['username'],
                    'email'     => $user['email'],
                    'hp'        => $user['hp'],
                    'alamat'    => $user['alamat'],
                    'uang'      => $user['uang'],

                ];

                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
                session()->set('log', true);
                session()->set($dataUser);

            if(session('cart'))
            {
               $this->saveKeranjangDaftar();
            
            }
                return redirect()->to('/');
                
    }


    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $test = $this->request->getVar('url');

        if(!$this->validate([
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ],
            ],
        ]))
        {
            return redirect()->back()->withInput();
        }

     
       
            $array = ['username' => $username, 'password' => MD5($password)];
            $cek = $this->userModel->where($array)->first();
            // if(password_verify($password, $cek['password'])){
            if($cek != 0){

            $dataUser = [
                'id'        => $cek['id'],
            ];

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            session()->set('log', true);
            session()->set($dataUser);
            
            if(session('cart'))
            {

                  $this->saveKeranjangLogin();
            
            }
            if($test != ''){
            return redirect()->to($test);
            } else {
                return redirect()->to('/');
            }

        } else
        {
            session()->setFlashdata('gagal', 'username atau password salah!');

            return redirect()->back()->withInput();
        }

            
        

    }

    public function saveKeranjangDaftar(){
        $count = $this->keranjangModel->query("SELECT produkC_id FROM keranjang WHERE user_id = ".session()->get('id')." ");
        $val = $count->getResultArray();
        // dd($val);
        
        if(count($val) >= 10)
        {
            session()->setFlashdata('keranjang_penuh', 'Keranjang sudah penuh');
            return redirect()->to('/');

        }
        
        $arr = $this->keranjangModel->select('produkC_id')->asArray()->where(['user_id' => session()->get('id')])->findColumn('produkC_id');

        foreach (session('cart') as $keranjang){
           
            $isi = [
                'id' => $keranjang['id'],
             ];
             
            if(count(session('cart')) > 1){
                $rule =[
                    'id' => 'required',
                ];
               

            }else{
                $rule = [
                    'id' => 'is_unique[keranjang.produkC_id]',

                ];
            }
        
            if(!$this->validateData($isi, $rule)){
                session()->setFlashdata('guest_gagal', 'Produk sudah ada di dalam keranjang!');
                return redirect()->to('/');
            }
           
            // dd($arr);
            if(!in_array($keranjang['id'], $arr))
            $this->keranjangModel->save([
                'produkC_id' => $keranjang['id'],
                'user_id'    => session()->get('id'),
                'jumlah'     => $keranjang['jumlah'],
            ]);

        }
    }

    public function saveKeranjangLogin(){
        
        $cart = session('cart');
                // $j_cart = count($cart);
                
                $column = array_column($cart, 'id');
                
                $count = $this->keranjangModel->query("SELECT produkC_id FROM keranjang WHERE user_id = ".session()->get('id')." ");
                $val = $count->getResultArray();
                // dd($val);
                
                $arr = $this->keranjangModel->select('produkC_id')->asArray()->where(['user_id' => session()->get('id')])->findColumn('produkC_id');

                $isi_cart = count($val);
             

                if($arr == false){
                    foreach($cart as $keranjang){
                        $this->keranjangModel->save([
                            'produkC_id' => $keranjang['id'],
                            'user_id'    => session()->get('id'),
                            'jumlah'     => $keranjang['jumlah'],
                        ]);
                    }

                }else{

        

                if(count($val) >= 10)
                {
                    session()->setFlashdata('keranjang_penuh', 'Keranjang sudah penuh');
                    return redirect()->to('/');

                } 

                
                $insert_id = array_diff($column, $arr);

                // $jumlah = array_column($cart, 'jumlah');

                // $total = $isi_cart + count($insert_id); 
                // dd($isi_cart);
                // $tess = 10 - count($insert_id);
                // dd(count($insert_id));
                
                // for($x = count($insert_id); $x < $total; $x++){
                //     $this->keranjangModel->save([
                //         'produkC_id' => $insert_id[$x],
                //         'user_id'    => session()->get('id'),
                //         'jumlah'     => $jumlah[$x],
                //     ]);

                //     if($x == 10){
                //         break;
                //     }
                // }

                // do {
                //         // if(!in_array($arr, $insert_id))
                //         $this->keranjangModel->save([
                //             'produkC_id' => $insert_id,
                //             'user_id'    => session()->get('id'),
                //             'jumlah'     => $jumlah,
                //         ]);
                        
                //         $isi_cart++;
                        
                //     } while ($isi_cart < $total);
               
                foreach ($cart as $keranjang){
                   
                 
                    $isi = [
                        'id' => $keranjang['id'],
                     ];
                     
                    if($isi_cart > 1){
                        $rule =[
                            'id' => 'required',
                        ];
                       
    
                    }else{
                        $rule = [
                            'id' => 'is_unique[keranjang.produkC_id]',

                        ];
                    }
                
                    if(!$this->validateData($isi, $rule)){
                        session()->setFlashdata('guest_gagal', 'Produk sudah ada di dalam keranjang!');
                        return redirect()->to('/');
                    }
                   
                    // dd($arr);
                    // while ($isi_cart < $total){
                    if(in_array($keranjang['id'], $insert_id))
                    $this->keranjangModel->save([
                        'produkC_id' => $keranjang['id'],
                        'user_id'    => session()->get('id'),
                        'jumlah'     => $keranjang['jumlah'],
                    ]);
                    $isi_cart++;

                    if($isi_cart == 10){
                        break;
                    }
                // }
                    
            
                // // dd($keranjang['id']);


                 }
            }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->back();
    }
}