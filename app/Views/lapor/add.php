<?= $this->extend('lapor/layout'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Form Pengaduan</h4>
        </div>
        <div class="card-body">
            <form action="/lapor/create" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for=""><strong>Masukkan judul</strong></label>
                    <input type="text" id="judul" name="judul" value="<?= old('judul') ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><strong>Pilih Foto</strong></label><br>
                    <img id="preview" src="#" style="width: 150px; margin-bottom: 10px;" alt="Gambar Anda">
                    <br>
                    <input type="file" id="foto" name="foto" value="<?= old('foto') ?>" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><strong>Tambahkan keterangan</strong></label>
                    <textarea name="ket" class="form-control <?= ($validation->hasError('ket')) ? 'is-invalid' : ''; ?>" id="ket" name="ket" placeholder="Masukkan Keterangan"><?= old('ket') ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('ket'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lapor</button>
            </form>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
<?= $this->endSection(''); ?>