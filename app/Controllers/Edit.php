<?php

namespace App\Controllers;

use App\Models\UserModel;

class Edit extends BaseController
{
    protected $produkModel;
    protected $genreModel;
    protected $genre2Model;
    protected $userModel;
    protected $keranjangModel;
    protected $helpers = ['form'];

    public function index($id)
    {
       

        
            $Uid = session()->get('id');
            $user = $this->userModel->getUser($Uid);
            $count = $this->keranjangModel->query("SELECT COUNT(produkC_id) AS isi FROM keranjang WHERE user_id = $Uid ");
            $val = $count->getRowArray();
        
    


       
        $data = [
            'title'   => 'Edit',
            'produk'  => $this->produkModel->getProduk($id),
            'produk2' => $this->produkModel,
            'genre1'  => $this->genreModel,
            'genre2'  => $this->genre2Model,
            'user'    => $user,
            'id'      => $id,
            'val'     => $val['isi'],
        ];


        return view('edit/index', $data);
    }

    public function produk($id)
    {
        $produkLama = $this->produkModel->getProduk($id);

        if(!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                    // 'rules' => 'uploaded[sampul]|max_size[sampul,1024]is_image[sampul]|mime_in[sampul,image/jpg,image/png,image/jpeg',
                'errors' => [
                    'is_image' => 'tipe file tidak diizinkan',
                    'mime_in' => 'tipe gambar tidak diizinkan',
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

                $namaGambarLama = $this->request->getVar('gambar');
                
                if($gambarUpload->getError() == 4)
                {
                    $namaGambar = $namaGambarLama;
                }
                else
                {
                    $namaGambar = $gambarUpload->getName();
                    $gambarUpload->move('/asset/img-profile', $namaGambar);
                    
                    if($produkLama['produk_gambar'] != 'default.png'){
                        unlink('img/' . $namaGambarLama);
                        }
                }

                sort($this->request->getVar('genre'));

                $pgenres = implode(', ', $this->request->getVar('genre'));

                // $this->produkModel->where('produk_id', $id);
                $this->produkModel->save([
                    'produk_id'              => $id, 
                    'produk_gambar'          => $namaGambar,
                    'produk_nama'            => $this->request->getVar('nama'),
                    'produk_genres'          => $pgenres,
                    'produk_penulis'         => $this->request->getVar('penulis'),
                    'produk_deskripsi'       => $this->request->getVar('deskripsi'),
                    'produk_harga'           => $this->request->getVar('harga'),
                    'produk_stok'            => $this->request->getVar('stok'),
                ]);
                
                // $this->produkModel->update();

                $genreID =   $this->request->getPost('genre');

                $this->genre2Model->where('produkg_id', $id)->delete();
                for ($i = 0; $i < sizeof($genreID); $i++){
                    $this->genre2Model->save([
                        'genreg_id'        => $genreID[$i],
                        'produkg_id'       => $id,
                  
                    ]);
                }



              

                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->back();
            }

    
            public function delete($id)
            {
        
                //cari gambar berdasasrkan id
                $buku = $this->produkModel->getProduk($id);
        
                //cek jika file gambarnya default
        
                if($buku['produk_gambar'] != 'default.png'){
                //hapus gambar
                unlink('asset/' . $buku['produk_gambar'] );
                }
                
                    // dd($id);

              $this->produkModel->where('produk_id', $id)->delete();
              $this->genre2Model->where('produkg_id', $id)->delete();
              session()->setFlashdata('pesan', 'Data Berhasil dihapus');
              return redirect()->back();
            }

            public function edit_genre($id)
            {
                // $nama = $this->request->getVar('nama');    
                // $id = $this->request->getPost('id');
                // if($this->genreModel->where('genre_nama', $nama))
                // {
                //     $ruleNama = 'required|is_unique[tb_genre.genre_nama]';
                // }
                // else 
                // {
                //     $ruleNama = 'required';
                // }

                if(!$this->validate([
                    'nama' => [
                        'rules' => 'required|is_unique[tb_genre.genre_nama]',
                        'errors' => [
                            'required' => '{field} belum diisi',
                            'is_unique' => 'genre sudah terdaftar',
                        ]
                    ]
                ]))
                {
                    session()->setFlashdata('gagal', 'Data gagal diubah');
                    return redirect()->back()->withInput();
                }


                $this->genreModel->save([
                    'genre_id' => $id,
                    'genre_nama' => $this->request->getPost('nama'),
                ]);
                

                session()->setFlashdata('pesan', 'Data berhasil diubah');
                return redirect()->back();
                
            }


            public function delete_genre($id)
            {
                $this->genreModel->where('genre_id', $id)->delete();

                session()->setFlashdata('pesan', 'Data Berhasil dihapus');
                return redirect()->back();
            }
        
}