<?= $this->extend('layouts/header.php') ?>

<?= $this->Section('content') ?>


<link rel="stylesheet" href="style.css">


<section>
    <div class="container">

        <h2 class="text-center">Daftar Produk</h2><br>

        <div class="box-p">
            <div class="input-group">
                <form action="" method="get">
                    <input type="text" class="form-control input-cari" name="keyword" id="myInput"
                        placeholder="Cari nama disini..." value="<?= ($keyword) ? $keyword : '' ?>">
                </form>

            </div>
            <table id="myTable" class="table table-hover table-striped table-bordered text-center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Edit</th>
                </tr>
                <?php 


                            if($produk > 0){
                                $no = 1 + (10 * ($currentPage - 1));
                                foreach($produk as $row):
                                

                                //    $query = $produk2->query("SELECT *, GROUP_CONCAT(genre_nama ORDER BY genre_nama SEPARATOR ' , ') AS genres, GROUP_CONCAT(genre_id ORDER BY genre_nama SEPARATOR ' , ') AS genres_id FROM tb_produk INNER JOIN genre ON produkg_id=produk_id INNER JOIN tb_genre ON genre_id=genreg_id WHERE produk_stok > 0 AND produk_nama LIKE '%".$row['produk_nama']."%' GROUP BY produk_nama ORDER BY genre_nama");
                                    
                                //    $genres = $query->getRowArray();
                                   
                                   
                                   ?>

                <tr class="baris">
                    <th scope="row"><?= $no++ ?></th>
                    <td><a href="single/<?= $row['produk_id'] ?>"><img src="/asset/<?= $row['produk_gambar'] ?>" alt=""
                                width="50px"></a> </td>
                    <td class="nama" style="width:10rem"><a
                            href="single/<?= $row['produk_id'] ?>"><?= $row['produk_nama'] ?></a>
                    </td>
                    <td>
                        <span class="daftar-list-deskripsi"><?= $row['produk_deskripsi'] ?></span>

                    </td>
                    <td>
                        <p class="daftar-list-genre"><?= $row['produk_genres'] ?></p>

                    <td>Rp. <?= number_format($row['produk_harga']) ?></td>
                    <td><?= number_format($row['produk_stok']) ?></td>
                    <td>
                        <a href="/edit/<?= $row['produk_id'] ?>" class="btn btn-success">EDIT</a>
                        <form action="/edit/<?= $row['produk_id'] ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus produk?')">Delete</button>
                        </form>

                    </td>
                </tr>
                <?php  endforeach;} else{ ?>
                <tr>
                    <td colspan="8">Produk Masih Kosong</td>
                </tr>
                <?php } ?>

            </table>
            <i>Showing <?= count($produk) + (10 * ($currentPage - 1))?> of
                <?= $pager->getTotal('tb_produk', 'daftar_produk'); ?>
                books</i>

            <nav aria-label="..." class="pagination-riwayat">

                <?= $pager->links('tb_produk', 'daftar_produk'); ?>
            </nav>
        </div>
    </div>
</section>


<?= $this->endSection() ?>