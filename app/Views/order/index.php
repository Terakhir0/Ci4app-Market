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
                                <?php 
                            $no = 1; 
                            $total = 0;
                            if($order > 0){
                            foreach($order as $val):
                                $total += $val['produk_harga']*$val['jumlah'];
                            ?>
                                <th scope="row"><?= $no++ ?> <input type="hidden" name="ido[]"
                                        value="<?= $val['produk_id'] ?>">
                                </th>
                                <td><img src="/asset/<?= $val['produk_gambar'] ?>" alt="" width="50px"></td>
                                <td><input type="hidden" name="nama" value="<?= $val['produk_nama'] ?>">
                                    <?= $val['produk_nama'] ?>
                                </td>
                                <td><input type="hidden" name="harga" value="<?= $val['produk_harga'] ?>"> Rp.
                                    <?= number_format($val['produk_harga']) ?></td>
                                <td>
                                    <span class="text-jumlah">
                                        <p> <?= $val['jumlah'] ?></p>
                                        <input type="hidden" class="form-control"
                                            style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                            name="jumlah_beli[]" id="" value="<?= number_format($val['jumlah']) ?>"
                                            min="1" max="<?= number_format($val['produk_stok']) ?>">
                                        <input type="hidden" name="stok[]" value="<?= $val['produk_stok'] ?>">

                                    </span>
                                </td>
                            </tr>
                            <?php endforeach;} else return redirect()->to('/');  ?>
                        </tbody>


                    </table>

                    <input type="submit" name="beli" style="float:right; margin-bottom:10px; margin-left:1rem"
                        class=" btn btn-success" value="BELI">
                    <a style="float:right; margin-bottom:10px" href="/keranjang/<?= session()->get('id') ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Anda yakin ingin membatalkan pesanan?')">BATAL</a>
                    <h5 style="margin-top:2rem">Total : Rp. <?= number_format($total) ?></h4>
                        <input type="hidden" name="total" value="<?= $total ?>">
                        <input type="hidden" name="uang" value="<?= $user['uang'] ?>">

                </form>

            </div>
        </div>
        <h3 style="margin-top:1rem; margin-left:7.9rem;">Rekening Anda : Rp. <?= number_format($user['uang']) ?></h3>

    </section>
</body>

<?= $this->endSection() ?>