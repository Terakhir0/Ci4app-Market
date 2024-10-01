<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $userModel;
    protected $helpers = ['form'];

    public function index($id)
    {

       
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
        
        
      

        $data = [
            'title'  => 'Profile',
            'user' => $user,
            'val'   => $val['isi'],
        ];


        return view('profile/index', $data);
    }

    public function update($id)
    {
        $user = $this->userModel->getUser($id);

        if ($user['nama'] == $this->request->getVar('nama'))
        {
            $ruleNama = 'required';
        }
        else {
            $ruleNama = 'required|is_unique[user.nama]';
        }

        if($user['username'] == $this->request->getVar('username'))
        {
            $ruleUsername = 'required';
        } else {
            $ruleUsername = 'required|is_unique[user.username]';
        }
        if($user['hp'] == $this->request->getVar('hp'))
        {
            $ruleHP = 'required';
        } else {
            $ruleHP = 'required|is_unique[user.hp]';
        }
        if($user['email'] == $this->request->getVar('email'))
        {
            $ruleEmail = 'required';
        } else {
            $ruleEmail = 'required|is_unique[user.email]';
        }
        

        if(!$this->validate([
            
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                    // 'rules' => 'uploaded[sampul]|max_size[sampul,1024]is_image[sampul]|mime_in[sampul,image/jpg,image/png,image/jpeg',
                'errors' => [
                    'is_image' => 'tipe file tidak diizinkan',
                    'mime_in' => 'tipe gambar tidak diizinkan',
            ]
            ],
            'nama' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'username' => [
                'rules' => $ruleUsername,
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'email' => [
                'rules' => $ruleEmail,
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'hp' => [
                'rules' => $ruleHP,
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
                    session()->setFlashdata('gagal1', 'Data gagal diubah');
                    return redirect()->back()->withInput();
                } 

                $gambarUpload = $this->request->getFile('foto');
                $namaGambarLama = $this->request->getVar('gambar');
                
                if($gambarUpload->getError() == 4)
                {
                    $namaGambar = $namaGambarLama;
                }
                else
                {
                    $namaGambar = $gambarUpload->getName();
                    $gambarUpload->move('/asset/img-profile', $namaGambar);

                    if($user['gambar'] != 'default.png'){
                        unlink('img/' . $namaGambarLama);
                        }
                }

                $username = $this->request->getVar('username');

                $this->userModel->save([
                    'id'        => $id,
                    'gambar'    => $namaGambar,
                    'nama'      => $this->request->getVar('nama'),
                    'username'  => $username,
                    'email'     => $this->request->getVar('email'),
                    'hp'        => $this->request->getVar('hp'),
                    'alamat'    => $this->request->getVar('alamat'),
                ]);
                $dataUser = [
                    'id'        => $user['id'],
                   
    
                ];
                

                session()->setFlashdata('success', 'Data berhasil diubah');
                session()->set($dataUser);
                return redirect()->back();
                
    }

    public function uang($id)
    {
        $user = $this->userModel->getUser($id);

        if(!$this->validate(
            [
                'uang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} belum diisi',
                    ]
                    ],
                ]))
        {
            session()->setFlashdata('gagal2', 'gagal menambah uang');
                    return redirect()->back()->withInput();
        }

        $total = $user['uang'] + $this->request->getVar('uang');

        $this->userModel->save([
            'id'    => $id,
            'uang'  => $total,
        ]);

        $dataUser = [
            'id' => $user['id'],
        ];

        
        session()->setFlashdata('success2', 'Uang berhasil ditambahkan');
        session()->set($dataUser);
        return redirect()->back();

    }

    public function ubah_p($id)
    {
        $user = $this->userModel->getUser($id);

    if(!$this->validate([
        'password' => [
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} belum diisi',
            ] 
            ],
        'pass_confirm' => [
            'rules'  => 'required|matches[password]',
            'errors' => [
                'required' => '{field} belum diisi',
                'matches'  => 'password tidak sama'
            ]
            ],
    
    ]))
    {
        session()->setFlashdata('gagal3', 'gagal mengubah password');
        return redirect()->back()->withInput();
    }

    $this->userModel->save([
        'id'       => $id,
        'password' => MD5($this->request->getVar('password')),
    ]);

    $dataUser = [
        'id' => $user['id'],
    ];

    
    session()->setFlashdata('success3', 'Password berhasil diubah');
    session()->set($dataUser);
    return redirect()->back();

    }


}