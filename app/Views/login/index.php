<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $judul_web ?> | LaporDulu </title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>/assets2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>/assets2/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>/assets2/css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>/assets2/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>/assets2/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success alert-dismissable show fade">
                            <div class="alert-body">
                                <?= session()->getFlashdata('pesan') ?> Silahkan <strong>Login!</strong>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('err')) : ?>
                        <div class="alert alert-danger alert-dismissable show fade text-light">
                            <div class="alert-body">
                                <?= session()->getFlashdata('err') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="/login/prosesLogin">
                        <?= csrf_field() ?>
                        <h1>Login</h1>
                        <div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                        </div>
                        <div>
                            <input type="password" name="password" id="password" class="form-control mb-1" placeholder="Password" />
                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" />
                            <label class="form-check-label mt-1" for="inputRememberPassword">Show Password</label>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-secondary">Log in</button>
                        </div>
                        <div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Belum punya akun?
                                <a href="#signup" class="to_register"> Daftar </a>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form method="POST" action="<?= base_url('login/create') ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <h1>Buat akun</h1>
                        <div>
                            <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" placeholder="NIK" value="<?= old('nik') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nik'); ?>
                            </div>
                        </div>
                        <br>
                        <div>
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama" value="<?= old('nama') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                        <div>
                            <input type="text" class="form-control <?= ($validation->hasError('tlp')) ? 'is-invalid' : ''; ?>" id="tlp" name="tlp" placeholder="Telepon/No.Hp" value="<?= old('tlp') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tlp'); ?>
                            </div>
                        </div>
                        <div>
                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div>
                            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username" value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div>
                            <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password" value="<?= old('password') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="mb-2">
                            <textarea name="alamat" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= old('alamat') ?></textarea>
                        </div>
                        <img id="preview" src="#" style="width: 150px; margin-bottom: 10px;" alt="Gambar Anda">
                        <div class="mb-2">
                            <br>
                            <input type="file" id="foto" name="foto" value="<?= old('foto') ?>" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-secondary">Daftar</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Sudah punya akun ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- untuk menampilkan password -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-check-input').click(function() {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>
</body>

</html>