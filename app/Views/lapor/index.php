<?= $this->extend('lapor/layout'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Pengaduan</h4>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissable show fade">
                    <div class="alert-body">
                        <?= session()->getFlashdata('pesan') ?>
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
            <a href="<?= base_url('Lapor/add') ?>" class="btn btn-outline-primary mb-3"><i class="fa fa-plus-circle"></i> Pengaduan</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" width="100%" id="dataTable" name="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tgl Pengaduan</th>
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
                                <td><?= $value->judul ?></td>
                                <td><?= $value->tgl_pengaduan ?></td>
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
                                    <a href="/lapor/view/<?= $value->id_pengaduan ?>" class="btn btn-circle btn-outline-primary btn-sm"><i class="fa fa-eye"></i></a>
                                    <?php if ($value->status == 'proses') { ?>
                                        <a href="" class="btn btn-circle btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="/lapor/delete/<?= $value->id_pengaduan; ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_mehod" value="DELETE">
                                            <button type="submit" class="btn btn-circle btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus ? ');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    <?php } ?>
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