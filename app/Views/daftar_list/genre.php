<?= $this->extend('layouts/header') ?>

<?= $this->Section('content') ?>

<link rel="stylesheet" href="/css/style.css">

<!-- <form action="cari.php" method="post">
    <input type="search">
</form> -->


<body>



    <section>
        <div class="container">
            <div class="box-t-daftar-genre">
                <h2 class="text-center">Tambah Genre</h2><br>
                <form action="/tambah/tambah_genre" method="post">
                    <input type="text" class="form-control <?= (validation_show_error('namag')) ? 'is-invalid' : '' ?>"
                        name="namag" placeholder="Nama" value="<?= old('namag') ?>" required>
                    <div class="invalid-feedback">
                        <?= validation_show_error('namag') ?>
                    </div><br>
                    <input type="submit" class="btn btn-lg btn-primary" name="tambah" value="Tambah">

                </form>
                <br>
                <?php if (session()->getFlashdata(('pesan'))) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php } ?>
                <?php if (session()->getFlashdata(('gagal'))) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
                <?php } ?>

            </div>
        </div>

    </section>
    <section>
        <div class="container">
            <h2 class="text-center">Daftar Genre</h2><br>
            <div class="box-daftar-genre">
                <div class="input-group pt-4">
                    <input type="text" class="form-control input-cari" placeholder="Cari disini..." name="search"
                        id="input" onkeyup="filterFunction()">
                </div>

                <table class="table table-hover table-striped table-bordered text-center" id="table">
                    <thead>

                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $no = 1; 
                            if(count($genre) > 0 ){
                            foreach($genre as $data):



                            ?>
                        <form action="/edit/edit_genre/<?= $data['genre_id'] ?>" method="post"
                            enctype="multipart/form-data">
                            <tr class="baris" id="listGenre">
                                <th scope="row"><?= $no++ ?></th>
                                <td class="initial-input">
                                    <p> <?= $data['genre_nama'] ?></p>
                                    <input type="text" name="nama" id="nama"
                                        value="<?= ($data['genre_id'] == old('id') ) ?  ucwords(old('nama')) : ucwords($data['genre_nama']) ?>"
                                        class="form-control <?= (old('id') == $data['genre_id']) ? 'is-invalid' : ''  ?>">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama') ?>
                                    </div>
                                    <input type="hidden" value="<?= $data['genre_id']?>" name="id">
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Edit">
                        </form>

                        <form action="/edit/delete_genre/<?=$data['genre_id']?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus produk?')">Delete</button>
                        </form>
                        </td>
                        <tr class="last" style="display:none">
                            <td col="6">Genre tidak ditemukan!</td>
                        </tr>
                        </tr>

                        <?php  endforeach;} else{ ?>
                        <tr>
                            <td col="6">Genre Masih Kosong</td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
    var genres = document.getElementsByClassName("initial-input");
    var inputs = document.querySelectorAll('input[name="nama"]');

    for (var i = 0; i < genres.length; i++) {
        genres[i].addEventListener("click", editGenre);
        inputs[i].addEventListener("blur", updateItem);
    }

    function editGenre() {
        this.className = "edit";
        var input = this.querySelector("input");
        input.focus();
        input.setSelectionRange(0, input.value.length);
    }

    function updateItem() {
        // this.previousElementSibling.innerHTML = this.value;
        this.parentNode.className = "initial-input";
    }
    </script>

    <style>
    .initial-input {
        cursor: pointer;
        width: 60%;
    }

    .initial-input input {
        display: none;
    }

    td.edit p {
        display: none;

    }

    td.edit input {
        display: initial;
        text-align: center;
    }
    </style>

    <?= $this->endSection() ?>