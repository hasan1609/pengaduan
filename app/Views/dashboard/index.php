<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h1 class="h3 mb-3 text-gray-800">Jumlah Pengguna</h1>
                <hr>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><strong><i class="fas fa-users"></i>&emsp; User</strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small" href="<?= base_url('Users') ?>" style="text-decoration: none;"><strong>Jumlah :&emsp; <?= $user ?></strong></a>
                            </div>
                        </div>
                    </div>
                    <?php if (session()->id_level == 2) : ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><strong><i class="fas fa-user"></i>&emsp; Petugas</strong></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-black stretched-link" href="<?= base_url('Petugas') ?>" style="text-decoration: none;"><strong>Jumlah :&emsp; <?= $petugas ?></strong></a>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <hr>
                <h1 class="h3 mb-3 text-gray-800">Jumlah Pengaduan</h1>
                <hr>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><strong><i class="fas fa-list"></i>&emsp; Pengaduan</strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link" href="<?= base_url('Pengaduan') ?>" style="text-decoration: none; color:#f7c23el;"><strong>Jumlah :&emsp; <?= $pengaduan ?></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><strong><i class="fas fa-check-circle"></i>&emsp; Terverifikasi</strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link" href="<?= base_url('Pengaduan') ?>" style="text-decoration: none; color:#1cc98a;"><strong>Jumlah :&emsp; <?= $verif ?></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body"><strong><i class="fas fa-hourglass-half"></i>&emsp; Proses</strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link" href="<?= base_url('Pengaduan') ?>" style="text-decoration: none; color:#36b9cd;"><strong>Jumlah :&emsp; <?= $proses ?></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><strong><i class="fas fa-window-close"></i>&emsp; Ditolak</strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-black stretched-link" href="<?= base_url('Pengaduan') ?>" style="text-decoration: none; color:#e74a3b;"><strong>Jumlah :&emsp; <?= $tolak ?></strong></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <!-- Content Row -->
</div>
<!-- /.container-fluid -->

<?= $this->endSection(''); ?>