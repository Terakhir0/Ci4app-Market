<?php

namespace App\Controllers;

class Tambah extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $userModel;
    protected $helpers = ['form'];


    public function index()
    {


        
            $id = session()->get('id');
            $user = $this->userModel->getUser($id);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $id ");
            $val = $count->getRowArray();
        
     
        $data = [
            'title'  => 'Home',
            'user'   => $user,
            'genre'  => $this->genreModel->findAll(),
            'val'    => $val['isi'],
            
        ];


        return view('tambah/index', $data);
    }


    public function tambah_produk()
    {

        if(!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg,image/gif,image/webm]',
                    // 'rules' => 'uploaded[sampul]|max_size[sampul,1024]is_image[sampul]|mime_in[sampul,image/jpg,image/png,image/jpeg',
                'errors' => [
                    'is_image' => 'tipe file tidak diizinkan',
                    'mime_in' => 'tipe gambar tidak diizinkan',
                    'max_size' => 'ukuran gambar terlalu besar',
            ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ]
                ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ]
                ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                ]
                ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
                ],
            'stok' => [
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
                
                if($gambarUpload->getError() == 4)
                {
                    $namaGambar = 'default.png';
                }
                else
                {
                    $namaGambar = $gambarUpload->getName();
                    $gambarUpload->move('asset', $namaGambar);
                }

                sort($this->request->getVar('genre'));

                $pgenres = implode(', ', $this->request->getVar('genre'));


                $this->produkModel->save([
                    'produk_gambar'          => $namaGambar,
                    'produk_nama'            => $this->request->getVar('nama'),
                    'produk_genres'          => $pgenres,
                    'produk_penulis'         => $this->request->getVar('penulis'),
                    'produk_deskripsi'       => $this->request->getVar('deskripsi'),
                    'produk_harga'           => $this->request->getVar('harga'),
                    'produk_stok'            => $this->request->getVar('stok'),
                ]);
                
                $last = $this->produkModel->insertID();

                $genreID = $this->request->getPost('genre');

                // $jmlh = count($genreID);

                for ($i = 0; $i < count($genreID); $i++){
                    $this->genre2Model->save([
                        'genreg_id'        => $genreID[$i],
                        'produkg_id'       => $last,
                  
                    ]);
                }
                
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->back();
            }


            public function tambah_genre()
            {
                if(!$this->validate([
                    'namag' => [
                        'rules' => 'required|is_unique[tb_genre.genre_nama]',
                        'errors' => [
                            'required' => '{field} belum diisi',
                            'is_unique' => 'genre sudah terdaftar',
                        ]
                    ]
                ])){

                    session()->setFlashdata('gagal', 'Data gagal ditambah');
                    return redirect()->back()->withInput();
                }

                $this->genreModel->save([
                    'genre_nama' => $this->request->getVar('namag'),
                ]);

                session()->setFlashdata('berhasil', 'Data berhasil ditambah');
                return redirect()->back();
            }

}