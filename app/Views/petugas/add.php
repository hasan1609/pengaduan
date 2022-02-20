<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Tambah Petugas</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('petugas/create') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for=""><strong>Masukkan nama</strong></label>
                    <input type="text" id="nama" name="nama" value="<?= old('nama') ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><strong>Masukkan username</strong></label>
                    <input type="text" id="username" name="username" value="<?= old('username') ?>" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><strong>Masukkan password</strong></label>
                    <input type="text" id="password" name="password" value="<?= old('password') ?>" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><strong>Masukkan tlp</strong></label>
                    <input type="text" id="tlp" name="tlp" value="<?= old('tlp') ?>" class="form-control <?= ($validation->hasError('tlp')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tlp'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
<?= $this->endSection(''); ?>