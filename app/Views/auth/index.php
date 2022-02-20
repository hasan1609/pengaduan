<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul_web ?> | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <h4>Masuk?</h4>
                            <h6 class="font-weight-light">Silahkan login terlebih dahulu !</h6>
                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-danger alert-dismissable show fade text-black">
                                    <div class="alert-body">
                                        <?= session()->getFlashdata('pesan') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form class="pt-3" method="POST" action="/auth/cek_login">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="username" value="<?= old('username') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="password" value="<?= old('password') ?>">
                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" />
                                    <label class="form-check-label mt-2" for="inputRememberPassword">Show Password</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="login">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>/assets/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url() ?>/assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>/assets/js/misc.js"></script>
    <!-- endinject -->

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