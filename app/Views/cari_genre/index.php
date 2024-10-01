<?= $this->extend('layouts/header'); ?>

<?= $this->Section('content') ?>
<link rel="stylesheet" href="/css/style.css">

<div class="container-fluid filter">
    <div class="primary filter-btn">
        <button class="btn btn-pm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample" style="background-color:blue">
            Filter
        </button>
    </div>
    <form action="/genres/">

        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="edit-genre">
                    <?php 
                            if(count($genre1) > 0 ) {
                                foreach($genre1 as $data):
                                    $checked = explode( " , ", $keyword_genre);
                                    $check2 = $keyword_genre;
                                    // $datase = in_array($data['genres'], $checked);
                                    // print_r($datase);
                                    // print_r ($checked);
                            ?>
                    <div class="form-check edit-genre-form">

                        <input class="form-check-input edit-genre" name="g[]" type="checkbox"
                            value="<?= $data['genre_nama'] ?>"
                            <?= ($data['genre_nama'] == $keyword_genre )? 'checked' : ''  ?> id="flexCheckDefault">
                        <label class="form-check-label edit-genre" for="flexCheckDefault">
                            <?= $data['genre_nama'] ?>
                        </label>
                    </div>
                    <?php endforeach;} else{?>
                    <p> Genre Tidak Ada</p>
                    <?php } ?>
                </div>
                <div class="tombol-edit-genre">
                    <input type="submit" class="btn btn-lg btn-primary" id="btn-edit-genre">
                </div>
            </div>
        </div>

    </form>
</div>

<section>
    <div class="container-fluid">


        <div class="box-s" id="box-s">

            <?php 

                // $genres = implode(', ', $_GET['genres']);

                // $count = count($keyword_genre);
                // for($x = 0; $x < 1; $x++){ 
                //     $search = "AND genre_nama IN ('$keyword_genre[$x]') ";
                //     };

                // $produk->query("SELECT *, GROUP_CONCAT(genre_nama ORDER BY genre_nama SEPARATOR ' , ') AS genres FROM tb_produk INNER JOIN genre ON produkg_id=produk_id INNER JOIN tb_genre ON genre_id=genreg_id WHERE produk_stok > 0 AND genre_nama IN $keyword_genre GROUP BY produk_nama ORDER BY produk_id ASC");        

                // dd($produk);
                
                if($produk != false){
                   


                foreach($produk as $data): 
                //     $genres = $_GET['genres'];
                // $genre_p = $produk2->query("SELECT *, GROUP_CONCAT(genre_nama ORDER BY genre_nama SEPARATOR ' , ') AS genres FROM tb_produk INNER JOIN genre ON produkg_id=produk_id INNER JOIN tb_genre ON genre_id=genreg_id WHERE produk_stok > 0 AND produk_nama LIKE '%".$data['produk_nama']."%' GROUP BY produk_nama ORDER BY genre_id");

                
                // $datag = $genre_p->getRowArray();

                //  $array[] = explode(" , ", $datag['genres']);
                //  print_r($array);
                //    $array = explode( ' , ', $datag['genres']);
                    // if(in_array($data['genres'], $_GET['genres'])){
                ?>




            <div class="col-5" id="col-5">

                <a href="/single/<?= $data['produk_id'] ?>"><img src="/asset/<?= $data['produk_gambar']; ?>"
                        class="img-ps"></a>
                <div class="item-series">
                    <a id="title" class="title" href="/single/<?= $data['produk_id'] ?>" style="text-decoration:none">
                        <?= $data['produk_nama'] ?>
                    </a>
                    <div class="item-genre" id="item-genre">
                        <p>
                            <?= $data['produk_genres'] ?>
                        </p>
                    </div>

                    <div class="author-s">
                        <p><?= $data['produk_penulis']; ?></p>
                    </div>
                    <div class="deskripsi-s">
                        <p><?= $data['produk_deskripsi'] ?></p>
                    </div>


                    <div class="tombol-c">
                        <a>Rp. <?= number_format($data['produk_harga']) ?></a>


                        <form action="/order/beli/<?= $data['produk_id'] ?>" method="post">
                            <button type="button" class="btn btn-success btn-c" data-bs-toggle="modal"
                                data-bs-target="#order-modal<?= $data['produk_id'] ?>">
                                Beli
                            </button>

                            <div class="modal fade" id="order-modal<?= $data['produk_id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ingin membeli produk?
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="/asset/<?= $data['produk_gambar'] ?>" alt="" class="modal-gambar">
                                            <h4 class="modal-judul"><?= $data['produk_nama'] ?></h4>
                                            <span class="text-jumlah"> Jumlah : <input type="number"
                                                    class="form-control"
                                                    style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                                    name="jumlah_beli[]" id="" value="1" min="1"
                                                    max="<?= $data['produk_stok'] ?>" required>
                                                <input type="hidden" name="stokp" value="<?= $data['produk_stok'] ?>">
                                            </span>

                                            <br>
                                            <br>
                                            <p style="padding-left:7rem">Stok : <?= $data['produk_stok'] ?>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="idp[]" value="<?= $data['produk_id'] ?>">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <input type="submit" name="beli" class="btn btn-primary" value="Beli">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <form
                            action="<?= (session('log') == true)? '/keranjang/save' : '/keranjangGuest/guest_save' ?> "
                            method="post">
                            <button type="button" class="btn btn-info btn-c" data-bs-toggle="modal"
                                data-bs-target="#cart-modal<?= $data['produk_id'] ?>">
                                CART
                            </button>
                            <div class="modal fade" id="cart-modal<?= $data['produk_id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Masukkan dalam
                                                keranjang?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="/asset/<?= $data['produk_gambar'] ?>" alt="" class="modal-gambar">
                                            <h4 class="modal-judul"><?= $data['produk_nama'] ?></h4>
                                            <span class="text-jumlah"> Jumlah : <input type="number"
                                                    class="form-control"
                                                    style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                                    name="jumlah" id="" value="1" min="1"
                                                    max="<?= $data['produk_stok'] ?>" required></span>
                                            <br>
                                            <br>
                                            <p style="padding-left:7rem">Stok : <?= $data['produk_stok'] ?>
                                            </p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <input type="hidden" name="idc" value="<?= $data['produk_id'] ?>">
                                            <input type="hidden" name="guest_gambar"
                                                value="<?= $data['produk_gambar'] ?>">
                                            <input type="hidden" name="guest_nama" value="<?= $data['produk_nama'] ?>">
                                            <input type="hidden" name="guest_harga"
                                                value="<?= $data['produk_harga'] ?>">
                                            <input type="submit" name="cart" class="btn btn-primary"
                                                data-bs-dismiss="modal" value="Ya">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <?php  endforeach; }  else{ ?>
            <h3 class="text-center" style="margin-left:29rem">Genre yang anda cari tidak ada</h3>
            <?php } ?>


        </div>
    </div>
    <div class="" style="  display: flex; position:relative; ">

        <i>Showing <?= count($produk) + (10 * ($currentPage - 1))?> of
            <?= $pager->getTotal('tb_produk', 'daftar_produk'); ?>
            books</i>
    </div>
    <nav aria-label="..." class="pagination-riwayat">


        <?= $pager->links('tb_produk', 'daftar_produk'); ?>
    </nav>

    </div>
</section>

<?= $this->endSection() ?>