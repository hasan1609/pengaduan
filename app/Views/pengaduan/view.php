<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <?php foreach ($pengaduan as $row => $value) : ?>
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><?= $value->judul ?></h5>
            </div>
            <div class="card-body">
                <?php if ($value->status == 'proses') {
                    echo '<label class="badge badge-warning">Pending</label>';
                } elseif ($value->status == 'selesai') {
                    echo '<label class="badge badge-success">Diterima</label>';
                } else {
                    echo '<label class="badge badge-danger">Ditolak</label>';
                } ?>
                <hr>
                <blockquote class="blockquote">
                    <h5><strong>Pengaduan :</strong></h5>
                    <p><?= $value->isi ?></p>
                    <footer class="blockquote-footer">By <cite title="Source Title"><strong><?= $value->nama ?></strong></cite></footer>
                    <small><?= $value->tgl_pengaduan ?></small>
                </blockquote>
                <a href="#overlayku"><img src="<?= base_url() ?>/images/<?= $value->foto ?>" style="width: 150px; margin-bottom: 5px;" class="img-thumbnail thumb"></a>
                <div class="overlay overlayku" id="overlayku">
                    <a href="#" class="close">x</a>
                    <img src="<?= base_url() ?>/images/<?= $value->foto ?>" class="jumbo">
                </div>
                <hr>
                <?php if ($value->status == 'proses') { ?>
                    <form method="post" action="/pengaduan/post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="<?= $value->id_pengaduan ?>">
                        <div class="form-group mt-3">
                            <label for=""><strong>Tanggapan pengaduan</strong></label>
                            <textarea class="form-control" name="tanggapan" id="tanggapan"></textarea>
                        </div>
                        <button type="submit" name="terima" class="btn btn-primary mr-1">Terima</button>
                        <button type="submit" name="tolak" class="btn btn-danger mr-1">Tolak</button>
                    <?php } else { ?>
                        <?php foreach ($tanggapan as $rows => $values) : ?>
                            <blockquote class="blockquote blockquote-primary">
                                <h5><strong>Tanggapan :</strong></h5>
                                <p><?= $values->tanggapan ?></p>
                                <footer class="blockquote-footer">Verified By <cite title="Source Title"><strong><?= $values->nama_petugas ?></strong></cite></footer>
                                <small><?= $values->tgl_tanggapan ?></small>
                            </blockquote>
                        <?php endforeach ?>
                    <?php } ?>
                    <a href="/pengaduan" class="btn btn-warning">Kembali</a>
                    </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
<?= $this->endSection(''); ?>