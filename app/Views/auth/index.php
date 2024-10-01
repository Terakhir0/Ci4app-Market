<?= $this->extend('layouts/header'); ?>

<?= $this->Section('content'); ?>


<link rel="stylesheet" href="/css/style.css">

<body>
    <section>
        <div class="container container-log">
            <div class="box-log">
                <h2 class="text-center">Login</h2><br>
                <form action="/auth/login" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-floating">
                        <input type="text"
                            class="form-control <?= (validation_show_error('username') || session()->getFlashdata('gagal')) ? 'is-invalid' : '' ?>"
                            name="username" value="<?= old('username') ?>" placeholder="Username">
                        <label for="userame">Username</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('username') ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="password"
                            class="form-control <?= (validation_show_error('password') || session()->getFlashdata('gagal')) ? 'is-invalid' : '' ?>"
                            name="password" value="<?= old('password') ?>" placeholder="Password">
                        <label for="password">Password</label>
                        <div class="invalid-feedback">
                            <?= validation_show_error('password') ?>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('gagal')) { ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <?php } ?>
                    <br>
                    <input type="submit" class="btn btn-lg btn-primary btn-login" name="submit" value="Login">
                    <input type="hidden" value="<?= $url ?>" name="url">
                </form>

                <a href="auth/daftar">Belum Punya Akun?</a>
            </div>
        </div>

    </section>
</body>


<?= $this->endSection(); ?>