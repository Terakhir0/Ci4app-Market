<?= $this->extend('layouts/header'); ?>

<?= $this->Section('content'); ?>

<link rel="stylesheet" href="/css/stlyle.css">

<section>
    <div class="container container-reg">
        <div class="box-reg">
            <h2 class="text-center">Register</h2><br>
            <form action="/auth/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="file" class="form-control" name="gambar"><br>
                <div class="form-floating">
                    <input type="text" class="form-control <?= (validation_show_error('nama')) ? 'is-invalid' : '' ?>"
                        name="nama" placeholder="Nama" value="<?= old('nama') ?>">
                    <label for="nama">Nama</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text"
                        class="form-control <?= (validation_show_error('username')) ? 'is-invalid' : '' ?>"
                        name="username" value="<?= old('username') ?>" placeholder="Username">
                    <label for="uname">Username</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('username') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="password"
                        class="form-control <?= (validation_show_error('password')) ? 'is-invalid' : '' ?>"
                        name="password" value="<?= old('password') ?>" placeholder="Password">
                    <label for="password">Password</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('password') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : '' ?>"
                        name="email" value="<?= old('email') ?>" placeholder="Email">
                    <label for="email">Email</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('email') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" class="form-control <?= (validation_show_error('hp')) ? 'is-invalid' : '' ?>"
                        name="hp" value="<?= old('hp') ?>" placeholder="No. HP">
                    <label for="hp">No. HP</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('hp') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="text" class="form-control <?= (validation_show_error('alamat')) ? 'is-invalid' : '' ?>"
                        name="alamat" value="<?= old('alamat') ?>" placeholder="Alamat">
                    <label for="alamat">Alamat</label>
                    <div class="invalid-feedback">
                        <?= validation_show_error('alamat') ?>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <input type="number" class="form-control" name="uang" value="<?= old('uang') ?>" placeholder="Uang">
                    <label for="uang">Uang</label>
                </div>
                <br>
                <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Daftar">
                <a href="login.php" style="float:right; padding-top:10px">Sudah Punya Akun?</a>

            </form>

        </div>
    </div>

</section>

<?= $this->endSection(); ?>