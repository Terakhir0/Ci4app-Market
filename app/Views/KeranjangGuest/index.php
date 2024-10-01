<?= $this->extend('layouts/header') ?>

<?= $this->Section('content');  ?>

<link rel="stylesheet" href="style.css">

<!-- <form action="cari.php" method="post">
    <input type="search">
</form> -->

<body>
    <section>
        <div class="container">
            <h2 class="text-center">Daftar Keranjang</h2><br>
            <div class="box-k">

                <table class="table table-hover table-striped table-bordered text-center">
                    <thead>

                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post">
                            <tr>
                                <?php 
                            $no = 1; 
                            $total = 0;
                            if($chart > 0){
                            foreach($chart as $data):
                            //    dd($data);
                            ?>
                                <th scope="row">
                                    <input type="hidden" name="idp[]" value="<?= $data['id'] ?>">
                                    <?= $no++ ?>
                                </th>
                                <td><img src="/asset/<?= $data['gambar'] ?>" alt="" width="50px"></td>
                                <td><?= $data['nama'] ?></td>
                                <td>Rp. <?= number_format($data['harga']) ?></td>
                                <td>
                                    <span class="text-jumlah">
                                        <input type="number" class="form-control"
                                            style="width:5rem; margin-left: 0.5rem; padding-right:3px"
                                            name="jumlah_beli[]" min="1" max="" id=""
                                            value="<?= number_format($data['jumlah']) ?>" required>

                                        <input type="hidden" name="stokp" value="">
                                    </span>
                                </td>
                                <td>
                        </form>

                        <form action="/keranjangGuest/guest_delete/<?= $data['id'] ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus produk?')">Delete</button>
                        </form>
                        </td>
                        </tr>



                        <?php
                        $jml = $data['harga'] * $data['jumlah'];
                        $total += $jml ;
                        endforeach;} else{ ?>
                        <tr>
                            <td colspan="6">Keranjang Masih Kosong</td>
                        </tr>
                        <?php } ?>

                    </tbody>

                    <a style="float:right; margin-bottom:10px" href="/keranjangGuest/guest_reset" class="btn btn-danger"
                        onclick="return confirm('Anda yakin ingin mereset keranjang?')">Reset</a>
                </table>

                <?php if($chart > 0){ ?>
                <a href="/auth" style="float:right; margin-bottom:10px" name="beli" class="btn btn-success"
                    onclick="alert('Silahkan login terlebih dahulu!')">BELI</a>

                <?php } else { ?>

                <a style="float:right; margin-bottom:10px" name="beli" class="btn btn-success"
                    onclick="alert('Produk masih kosong!')">BELI</a>
                <?php } ?>

                <h5 style="margin-top:2rem">Total : Rp. <?= number_format($total) ?></h4>
            </div>
        </div>
    </section>
</body>

<script>
function kosong() {
    alert("Produk masih kosong!")
}
</script>

<?= $this->endSection(); ?>