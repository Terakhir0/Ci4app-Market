<?= $this->extend('layouts/header') ?>

<?= $this->Section('content') ?>

<link rel="stylesheet" href="style.css">

<!-- <form action="cari.php" method="post">
    <input type="search">
</form> -->

<body>

    <section>
        <div class="container">
            <h2 class="text-center">Daftar Riwayat</h2><br>
            <div class="box-k">
                <div class="input-group">
                    <form action="/riwayat/<?= $id ?>" method="get">
                        <input type="text" class="form-control input-cari" name="keyword"
                            placeholder="Cari riwayat disini..." value="">
                    </form>

                </div>
                <table class="table table-hover table-striped table-bordered text-center">
                    <thead>

                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1 + (10 * ($currentPage - 1));
                            $total = 0;
                            if(count($riwayat) > 0){
                            foreach($riwayat as $row):
                                $dt = date_create($row['tanggal_beli']);
                            ?>
                        <tr class="baris">

                            <th scope="row">
                                <?= $no++ ?>
                            </th>
                            <td><?= $row['produk_nama'] ?></td>
                            <td>Rp. <?= number_format($row['produk_harga']) ?></td>
                            <td>
                                <span class="text-jumlah">
                                    <?=  $row['produk_jumlah'] ?>
                                </span>
                            </td>
                            <td>
                                <?=date_format($dt, 'Y-m-d H:i') ?>
                            </td>
                        </tr>

                        <?php
                        $jml = $row['produk_harga'] * $row['produk_jumlah'];
                        $total += $jml ;
                        endforeach;} else{ ?>
                        <tr>
                            <td colspan="6">Riwayat Masih Kosong</td>
                        </tr>
                        <?php } ?>


                    </tbody>

                </table>

                <i>Showing <?= count($riwayat) + (10 * ($currentPage - 1))?> of
                    <?= $pager->getTotal('riwayat', 'daftar_produk'); ?>
                    items</i>

                <nav aria-label="..." class="pagination-riwayat">


                    <?= $pager->links('riwayat', 'daftar_produk'); ?>
                </nav>
            </div>
        </div>
    </section>

</body>

<?= $this->endSection(); ?>