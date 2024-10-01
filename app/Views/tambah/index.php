<?= $this->extend('layouts/header.php'); ?>

<?= $this->Section('content'); ?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>


<?= (session()->getFlashdata('success')) ? '<script>alert("Produk berhasil di tambahkan")</script>' : '' ?>
<section>
    <div class="container container-t">
        <div class="box-t">
            <h2 class="text-center">Tambah Produk</h2><br>
            <form action="/tambah/tambah_produk" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : '' ?>"
                    name="foto" value="<?= old('foto') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('foto') ?>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : '' ?>"
                        id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Nama">
                    <label for="nama">Nama</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text"
                        class="form-control <?= (validation_show_error('penulis')) ? 'is-invalid' : '' ?>" id="penulis"
                        name="penulis" value="<?= old('penulis') ?>" placeholder="Penulis">
                    <label for="penulis">Penulis</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('penulis') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <textarea type="text"
                        class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : '' ?>"
                        name="deskripsi" id="deskripsi" value="<?= old('deskripsi') ?>" placeholder="Deskripsi"
                        required> </textarea>
                    <label style="margin-top:4.5rem" for="deskripsi">Deskripsi</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('deskripsi') ?>
                    </div>
                </div>

                <br>
                <div class="form-floating">
                    <input type="number"
                        class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : '' ?>" name="harga"
                        id="harga" value="<?= old('harga') ?>" placeholder="Harga">
                    <label for="harga">Harga</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('harga') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="number" class="form-control <?= (validation_show_error('stok')) ? 'is-invalid' : '' ?>"
                        id="stok" name="stok" value="<?= old('stok') ?>" placeholder="Stok">
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
                            if(count($genre) > 0 ) {
                                foreach($genre as $data):
                            ?>
                            <div class="form-check edit-genre-form">
                                <input class="form-check-input edit-genre" name="genre[]" type="checkbox"
                                    value="<?= $data['genre_id'] ?>" id="flexCheckDefault">
                                <label class="form-check-label edit-genre" for="flexCheckDefault">
                                    <?= $data['genre_nama'] ?>
                                </label>
                            </div>
                            <?php endforeach;} else{?>
                            <p> Genre Tidak Ada</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Tambah">
            </form>
        </div>
    </div>
</section>
<script>
CKEDITOR.replace('deskripsi');
</script>
<?= $this->endSection(); ?>