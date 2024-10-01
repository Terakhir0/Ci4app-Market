<?= $this->extend('layouts/header') ?>


<?= $this->section('content') ?>



<body>
    <section>
        <div class="container">
            <h2 class="text-center">Beli Produk</h2>
            <div class="box-k">
                <form action="/order/beli_keranjang" method="post">
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>

                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <th scope="row">1<input type="hidden" name="ido[]" value="<?= $produk['produk_id'] ?>">
                                </th>
                                <td><img src="/asset/<?= $produk['produk_gambar'] ?>" alt="" width="50px"></td>
                                <td><input type="hidden" name="nama"
                                        value="<?= (validation_show_error('uang') ? old('nama') : $produk['produk_nama']) ?>">
                                    <?= $produk['produk_nama'] ?>
                                </td>
                                <td><input type="hidden" name="harga"
                                        value="<?= (validation_show_error('uang') ? old('harga') : $produk['produk_harga']) ?>">
                                    Rp.
                                    <?= number_format($produk['produk_harga']) ?></td>
                                <td>
                                    <span class="text-jumlah">
                                        <p> <?= $jumlah?></p>
                                        <input type="hidden" class="form-control"
                                            style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                            name="jumlah_beli[]" id=""
                                            value="<?= (validation_show_error('uang') ? old('jumlah_beli.[]') : number_format($jumlah)) ?>"
                                            min="1">
                                        <input type="hidden" name="stok[]"
                                            value="<?= (validation_show_error('uang') ? old('stok.[]') : $produk['produk_stok']) ?>">

                                    </span>
                                </td>
                            </tr>
                        </tbody>


                    </table>

                    <input type="submit" name="beli" style="float:right; margin-bottom:10px; margin-left:1rem"
                        class=" btn btn-success" value="BELI">
                    <a style="float:right; margin-bottom:10px" href="/" class="btn btn-danger"
                        onclick="return confirm('Anda yakin ingin membatalkan pesanan?')">BATAL</a>
                    <h5 style="margin-top:2rem">Total : Rp.
                        <?= (validation_show_error('uang') ? number_format(old('total')) : number_format($produk['produk_harga'] * $jumlah)) ?>
                        </h4>
                        <input type="hidden" name="total"
                            value="<?= (validation_show_error('uang') ? old('total') : $produk['produk_harga'] * $jumlah) ?>">
                        <input type="hidden" name="uang"
                            value="<?= (validation_show_error('uang') ? old('uang') : $user['uang']) ?>">

                </form>

            </div>
        </div>
        <h3 style="margin-top:1rem; margin-left:7.9rem;">Rekening Anda : Rp.
            <?= (validation_show_error('uang') ? old('nama') : number_format($user['uang'])) ?></h3>

    </section>
</body>

<?= $this->endSection() ?>