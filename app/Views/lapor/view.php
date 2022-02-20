<?= $this->extend('lapor/layout'); ?>

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
                    <p class="h6"><?= $value->isi ?></p>
                    <footer class="blockquote-footer">By <cite title="Source Title"><strong><?= $value->nama ?></strong></cite></footer>
                    <small><?= $value->tgl_pengaduan ?></small>
                </blockquote>
                <a href="#overlayku"><img src="/images/<?= $value->foto ?>" style="width: 150px; margin-bottom: 5px;" class="img-thumbnail thumb"></a>
                <div class="overlay overlayku" id="overlayku">
                    <a href="#" class="close">x</a>
                    <img src="/images/<?= $value->foto ?>" class="jumbo">
                </div>
                <hr>
                <blockquote class="blockquote blockquote-primary">
                    <h5><strong>Tanggapan :</strong></h5>
                    <?php if ($value->status != 'proses') { ?>
                        <?php foreach ($tanggapan as $rows => $values) : ?>
                            <p class="h6"><?= $values->tanggapan ?></p>
                            <footer class="blockquote-footer">Verified By <cite title="Source Title"><strong><?= $values->nama_petugas ?></strong></cite></footer>
                            <small><?= $values->tgl_tanggapan ?></small>
                        <?php endforeach ?>
                    <?php } else {
                        echo '<p class="text-info">Maaf Masih belum ada tanggapan. Harap bersabar!!</p>';
                    } ?>
                </blockquote>
                <a href="/lapor" class="btn btn-warning">Kembali</a>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
<?= $this->endSection(''); ?>