<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Pengaduan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" id="dataTable" name="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Pengaduan</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengaduan as $row => $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->tgl_pengaduan ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->judul ?></td>
                                <td>
                                    <?php if ($value->status == 'proses') {
                                        echo '<label class="badge badge-warning">Pending</label>';
                                    } elseif ($value->status == 'ditolak') {
                                        echo '<label class="badge badge-danger">Ditolak</label>';
                                    } else {
                                        echo '<label class="badge badge-success">Dierima</label>';
                                    } ?>
                                </td>
                                <td>
                                    <a href="/pengaduan/view/<?= $value->id_pengaduan ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                    <a href="/pengaduan/print/<?= $value->id_pengaduan ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
<?= $this->endSection(''); ?>