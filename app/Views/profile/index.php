<?= $this->extend('layouts/header.php'); ?>

<?= $this->Section('content') ?>

<body>
    <section>
        <div class="container container-p">
            <h2 class="text-center pt-3">Profile Anda</h2>
            <div class="box-p">
                <form action="/profile/update/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <img src="/asset/img-profile/<?= $user['gambar']  ?>" class="foto-profil" alt=""><br>
                    <input type="hidden" name="gambar" value="<?= $user['gambar'] ?>">
                    <input type="file" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : '' ?>"
                        name="foto">
                    <div class="invalid-feedback">
                        <?= validation_show_error('foto') ?>
                    </div><br>
                    <div class="form-floating">
                        <input type="text"
                            class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : '' ?>" name="nama"
                            placeholder="Nama" value="<?= $user['nama'] ?>">
                        <label for="nama">Nama</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama') ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text"
                            class="form-control  <?= (validation_show_error('username')) ? 'is-invalid' : '' ?>"
                            name="username" value="<?= $user['username'] ?>" placeholder="Username">
                        <label for="userame">Username</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('username') ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="email"
                            class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : '' ?>"
                            name="email" value="<?= $user['email'] ?>" placeholder="Email">
                        <label for="email">Email</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('email') ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control <?= (validation_show_error('hp')) ? 'is-invalid' : '' ?>"
                            name="hp" value="<?= $user['hp'] ?>" placeholder="No. HP">
                        <label for="hp">No. HP</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('hp') ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text"
                            class="form-control <?= (validation_show_error('alamat')) ? 'is-invalid' : '' ?>"
                            name="alamat" value="<?= $user['alamat'] ?>" placeholder="Alamat">
                        <label for="alamat">Alamat</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('alamat') ?>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-lg btn-primary" name="edit" value="Edit">
                </form>
                <br>
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
            </div>

            <h2 class="text-center pt-3">Isi Rekening</h2>
            <div class="box-p">
                <h4>Uang yang anda miliki saat ini : Rp. <?= number_format($user['uang']); ?></h4>
                <form action="/profile/uang/<?= $user['id'] ?>" method="post">
                    <div class="form-floating">
                        <input type="number"
                            class="form-control <?= (validation_show_error('uang')) ? 'is-invalid' : '' ?>" name="uang"
                            placeholder="Rp. " value="<?= old('uang') ?>">
                        <label for="uang">Uang</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('uang') ?>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-lg btn-primary" name="tambah" value="Tambah">
                </form>
                <br>
                <?php if (session()->getFlashdata(('success2'))) { ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success2'); ?>
                </div>
                <?php } ?>
                <?php if (session()->getFlashdata(('gagal2'))) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('gagal2'); ?>
                </div>
                <?php } ?>
            </div>


            <h2 class="text-center pt-3">Ubah Password</h2>
            <div class="box-p">
                <form action="/profile/ubah_p/<?= $user['id'] ?>" method="post">
                    <div class="form-floating">
                        <input type="password"
                            class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : '' ?>"
                            id="password" name="password" placeholder="Password Baru " value="<?= old('password') ?>">
                        <label for="password">Password Baru</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('password') ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="password"
                            class="form-control <?= (validation_show_error('pass_confirm')) ? 'is-invalid' : '' ?>"
                            id="pass_confirm" name="pass_confirm" placeholder="Konfirmasi Password Baru ">
                        <label for="pass_confirm">Konfirmasi Password baru</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('pass_confirm') ?>
                        </div>
                    </div>
                    <br>
                    <?php if (session()->getFlashdata(('success3'))) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success3'); ?>
                    </div>
                    <?php } ?>
                    <input type="submit" class="btn btn-lg btn-primary" name="ubah" value="Ubah"><br>
                    <?php if (session()->getFlashdata(('gagal3'))) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal3'); ?>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>
</body>


<!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="script.js"> </script> -->

<?= $this->endSection() ?>