<?= $this->extend('layouts/header') ?>

<?= $this->Section('content') ?>


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>




<section>
    <div class="container container-t">
        <div class="box-t">
            <h2 class="text-center">Edit Produk</h2><br>
            <form action="/edit/produk/<?= $produk['produk_id'] ?>" method="post" enctype="multipart/form-data">
                <img src="/asset/<?= $produk['produk_gambar']; ?>" alt="" class="img-preview" width="300px">
                <input type="hidden" name="gambar" value="<?= $produk['produk_gambar']; ?>">
                <input type="file" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : '' ?> "
                    name="foto" id="foto" onchange="previewImg()">

                <div class="invalid-feedback">
                    <?= validation_show_error('foto') ?>
                </div><br>
                <div class="form-floating">
                    <input type="text" class="form-control  <?= (validation_show_error('nama')) ? 'is-invalid' : '' ?>"
                        id="nama" name="nama"
                        value="<?= (old('nama') == '' ) ?  $produk['produk_nama'] : old('nama')  ?>">
                    <label for="nama">Nama</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text"
                        class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : '' ?>" id="penulis"
                        name="penulis"
                        value="<?= (old('penulis') == '' ) ?  $produk['produk_penulis'] : old('penulis') ?>">
                    <label for="nama">Penulis</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('penulis') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <textarea type="text"
                        class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : '' ?> ?>"
                        name="deskripsi" id="deskripsi" placeholder="Deskripsi"
                        required><?= (old('deskripsi') == '' ) ?  $produk['produk_deskripsi'] : old('deskripsi') ?></textarea>
                    <label style="margin-top:4.5rem" for="deskripsi">Deskripsi</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('deskripsi') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="number"
                        class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : '' ?>" name="harga"
                        value="<?= (old('harga') == '' ) ?  $produk['produk_harga'] : old('harga') ?>">
                    <label for="harga">Harga</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('harga') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="number" class="form-control <?= (validation_show_error('stok')) ? 'is-invalid' : '' ?>"
                        id="stok" name="stok"
                        value="<?= (old('stok') == '' ) ?  $produk['produk_stok'] : old('stok') ?>" placeholder="Stok"
                        required>
                    <label for="stok">Stok</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('stok') ?>
                    </div>
                </div>
                <br>
                <p style="color:red">*Pilih setidaknya satu genre!</p>
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Pilih Genre
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="edit-genre">
                            <?php 
                                  $genre_p = $produk2->query("SELECT *, GROUP_CONCAT(genre_nama ORDER BY genre_nama SEPARATOR ' , ') AS genres FROM tb_produk INNER JOIN genre ON produkg_id=produk_id INNER JOIN tb_genre ON genre_id=genreg_id WHERE  produk_stok > 0 AND produk_id = '$produk[produk_id]' GROUP BY produk_nama ORDER BY genre_id");

                
                                  $datag = $genre_p->getRowArray();

                                  $all_genres = $genre1->findAll();

                               if(count($all_genres) > 0){
                                foreach($all_genres as $row):
                                
                                    $type = explode(' , ', $datag['genres']);
                                        

                            ?>


                            <div class="form-check edit-genre-form">
                                <!-- <input type="hidden" name="genres[]" value="<?php // $row['genre_id'] ?>"> -->
                                <input class="form-check-input edit-genre" name="genre[]"
                                    value="<?= $row['genre_id'] ?>" type="checkbox"
                                    <?= (!in_array($row['genre_nama'], $type))? '' : 'checked'  ?>>
                                <label class="form-check-label badge bg-primary rounded-pill " for="flexCheckDefault">
                                    <?= $row['genre_nama'] ?>
                                </label>
                            </div>

                            <?php endforeach; } else{?>
                            <p> Genre Tidak Ada</p>
                            <?php } ?>

                        </div>

                    </div>


                </div>

                <?php if (session()->getFlashdata(('success'))) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php } ?>
                <?php if (session()->getFlashdata(('gagal1'))) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('gagal1'); ?>
                </div>
                <?php } ?>
                <br>
                <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Edit">
            </form>
        </div>
    </div>
</section>
<script>
CKEDITOR.replace('deskripsi');

function previewImg() {

    const foto = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(foto.files[0]);

    fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
</script>


<?= $this->endSection() ?>