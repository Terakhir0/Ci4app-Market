<?= $this->extend('layouts/header') ?>


<?= $this->Section('content') ?>



<link rel="stylesheet" href="/css/style.css">



<body>




    <section>
        <div class="container-fluid conteiner-i">
            <div class="filter-index">
                <p id="genre-header-index">Genre</p>
                <div class="filter-genre-form">
                    <?php 
                            if(count($genre) > 0 ) {
                                foreach($genre as $data):
                                   

                            ?>

                    <a class="item-genres-index" href="/cari/genre/<?= $data['genre_nama'] ?>">
                        <?= $data['genre_nama'] ?>
                    </a>
                    </form>


                    <?php endforeach;} else{?>
                    <p> Genre Tidak Ada</p>
                    <?php } ?>
                </div>
            </div>



            <div class=" container box-i">
                <div class="header-text">
                    <h3 class="text-center">Buku</h3><br>
                </div>

                <div class="box-item-index">
                    <?php 
                    if(count($produk) > 0){
                    foreach($produk as $data){ ?>
                    <a href="single/<?= $data['produk_id'] ?>">
                        <div class="col-4">
                            <a href="single/<?= $data['produk_id'] ?>">
                                <img src="/asset/<?= $data['produk_gambar']; ?>" class="img-pr"> </a>

                            <a href="single/<?= $data['produk_id'] ?>" class="index-produk-item text-center">
                                <?= $data['produk_nama']; ?>
                            </a>
                            <div class="harga-item-produk">
                                <p>Rp. <?= number_format($data['produk_harga']) ?></p>
                            </div>


                            <div class="tombol-beli">
                                <button type="button" class="btn btn-success btn-beli" data-bs-toggle="modal"
                                    data-bs-target="#order-modal<?= $data['produk_id'] ?>">
                                    Beli
                                </button>
                                <button type="button" class="btn btn-info btn-cart" data-bs-toggle="modal"
                                    data-bs-target="#cart-modal<?= $data['produk_id'] ?>">
                                    CART
                                </button>

                                <form action="/order/beli/<?= $data['produk_id'] ?>" method="post">
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
                                                    <img src="/asset/<?= $data['produk_gambar'] ?>" alt=""
                                                        class="modal-gambar">
                                                    <h4 class="modal-judul"><?= $data['produk_nama'] ?></h4>
                                                    <span class="text-jumlah"> Jumlah : <input type="number"
                                                            class="form-control"
                                                            style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                                            name="jumlah_beli[]" id="" value="1" min="1"
                                                            max="<?= $data['produk_stok'] ?>" required>
                                                        <input type="hidden" name="stokp"
                                                            value="<?= $data['produk_stok'] ?>">
                                                    </span>
                                                    <br>
                                                    <br>
                                                    <p style="margin-right:17rem">Stok : <?= $data['produk_stok'] ?>
                                                    </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="idp[]" value="<?= $data['produk_id'] ?>">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <input type="submit" name="beli" class="btn btn-primary"
                                                        value="Beli">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form
                                    action="<?= (session('log') == true)? '/keranjang/save' : '/keranjangGuest/guest_save' ?> "
                                    method="post">
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
                                                    <img src="/asset/<?= $data['produk_gambar'] ?>" alt=""
                                                        class="modal-gambar">
                                                    <h4 class="modal-judul"><?= $data['produk_nama'] ?></h4>
                                                    <span class="text-jumlah"> Jumlah : <input type="number"
                                                            class="form-control"
                                                            style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                                            name="jumlah" id="" value="1" min="1"
                                                            max="<?= $data['produk_stok'] ?>" required></span>
                                                    <br>
                                                    <br>
                                                    <p style="margin-right:17rem">Stok : <?= $data['produk_stok'] ?>
                                                    </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <input type="hidden" name="idc" value="<?= $data['produk_id'] ?>">
                                                    <input type="hidden" name="guest_gambar"
                                                        value="<?= $data['produk_gambar'] ?>">
                                                    <input type="hidden" name="guest_nama"
                                                        value="<?= $data['produk_nama'] ?>">
                                                    <input type="hidden" name="guest_harga"
                                                        value="<?= $data['produk_harga'] ?>">
                                                    <input type="submit" name="cart" class="btn btn-primary"
                                                        data-bs-dismiss="modal" value="Ya">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>

                        </div>

                        <?php }} else{ ?>
                        <p>Data Tidak Ada</p>
                        <?php } ?>
                        <br>



                </div>

                <div class="" style="  display: flex; position:relative; top:-2rem; margin-left:2.5rem;">
                    <i>Showing <?= count($produk) + (15 * ($currentPage - 1))?> of
                        <?= $pager->getTotal('tb_produk', 'daftar_produk'); ?>
                        items</i>
                </div>

                <nav aria-label="..." class="pagination-riwayat">


                    <?= $pager->links('tb_produk', 'daftar_produk'); ?>
                </nav>
            </div>
    </section>



</body>


<?= $this->endSection() ?>