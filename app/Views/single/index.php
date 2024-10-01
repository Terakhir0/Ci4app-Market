<?= $this->extend('layouts/header') ?>

<?= $this->Section('content') ?>

<link rel="stylesheet" href="/css/style.css">
<section>
    <div class="container conteiner-si">

        <div class="box-dp">
            <div class="box-single">

                <img src="/asset/<?= $produk['produk_gambar'] ?>" width="100%">
            </div>
            <div class="box-single">

                <div class="ms-2 me-auto">
                    <h3 class="fw"><?= $produk['produk_nama'] ?></h3>
                    <p class="author-s"><?= $produk['produk_penulis'] ?></p>

                    <?php   //$query = $produk2->query("SELECT *, GROUP_CONCAT(genre_nama ORDER BY genre_nama SEPARATOR ', ') AS genres, GROUP_CONCAT(genre_id ORDER BY genre_nama SEPARATOR ', ') AS genres_id FROM tb_produk INNER JOIN genre ON produkg_id=produk_id INNER JOIN tb_genre ON genre_id=genreg_id WHERE produk_id = '$idp' ");
                    
                    // $genres = $query->getRowArray(); 
                    $array  = explode(', ', $produk['produk_genres']);
                    // $array2 = explode(', ', $genres['genres_id']);?>

                    <span>Genre : <?php for($i = 0; $i < count($array); $i++){       ?>


                        <a href="/cari/genre/<?= $array[$i] ?>" class="badge bg-primary rounded-pill">
                            <?= $array[$i]; ?>
                        </a>

                        <?php }   ?>

                        <p>Stok : <?= $produk['produk_stok'] ?></p>


                    </span>
                    <p class="text-sm-start">Sinospis :
                        <?= $produk['produk_deskripsi'] ?>
                    </p>



                </div>
                <div class="item-single">
                    <h4 class="mt-4 me-2">Harga : Rp.
                        <?php echo number_format( $produk['produk_harga'] )?>
                    </h4>
                    <button type="button" class="btn btn-success btn-s" data-bs-toggle="modal"
                        data-bs-target="#order-modal<?= $produk['produk_id'] ?>">
                        Beli
                    </button>

                    <button type="button" class="btn btn-info btn-cart-s" data-bs-toggle="modal"
                        data-bs-target="#cart-modal<?= $produk['produk_id'] ?>">
                        CART
                    </button>

                </div>


            </div>
        </div>
    </div>

    <form action="/order/beli/<?= $produk['produk_id'] ?>" method="post">
        <div class="tombol-beli">



            <div class="modal fade" id="order-modal<?= $produk['produk_id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingin membeli produk?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="/asset/<?= $produk['produk_gambar'] ?>" alt="" class="modal-gambar">
                            <h4 class="modal-judul"><?= $produk['produk_nama'] ?></h4>
                            <span class="text-jumlah"> Jumlah : <input type="number" class="form-control"
                                    style="width:5rem; margin-left: 0.5rem; padding-right:3px" name="jumlah_beli[]"
                                    id="" value="1" min="1" max="<?= $produk['produk_stok'] ?>" required>
                                <input type="hidden" name="stokp" value="<?= $produk['produk_stok'] ?>">
                            </span>
                            <br>
                            <br>
                            <p style="padding-left:7rem">Stok : <?= $produk['produk_stok'] ?></p>

                        </div>


                        <div class="modal-footer">
                            <input type="hidden" name="idp[]" value="<?= $produk['produk_id'] ?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <input type="submit" name="beli" class="btn btn-primary" value="Beli">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="<?= (session('log') == true)? '/keranjang/save' : '/keranjangGuest/guest_save' ?> " method="post">
        <div class="tombol-beli">

            <div class="modal fade" id="cart-modal<?= $produk['produk_id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Masukkan dalam
                                keranjang?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="/asset/<?= $produk['produk_gambar'] ?>" alt="" class="modal-gambar">
                            <h4 class="modal-judul"><?= $produk['produk_nama'] ?></h4>
                            <span class="text-jumlah"> Jumlah : <input type="number" class="form-control"
                                    style="width:5rem; margin-left: 0.5rem; padding-right:3px" name="jumlah" id=""
                                    value="1" min="1" max="<?= $produk['produk_stok'] ?>" required></span>

                            <br>
                            <br>
                            <p style="padding-left:7rem">Stok : <?= $produk['produk_stok'] ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <input type="hidden" name="idc" value="<?= $produk['produk_id'] ?>">
                            <input type="hidden" name="guest_gambar" value="<?= $produk['produk_gambar'] ?>">
                            <input type="hidden" name="guest_nama" value="<?= $produk['produk_nama'] ?>">
                            <input type="hidden" name="guest_harga" value="<?= $produk['produk_harga'] ?>">
                            <input type="submit" name="cart" class="btn btn-primary" data-bs-dismiss="modal" value="Ya">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

</section>


<?= $this->endSection() ?>