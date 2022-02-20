<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Petugas</h1>
        <a href="/petugas/add" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Petugas</a>
    </div>
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
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
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" width="100%" id="dataTable" name="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tlp</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($admin as $row => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama_petugas ?></td>
                                    <td><?= $value->username ?></td>
                                    <td><?= $value->tlp ?></td>
                                    <td>
                                        <!-- method http spofing -->
                                        <form action="/petugas/delete/<?= $value->id_petugas; ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_mehod" value="DELETE">
                                            <button type="submit" class="btn btn-round btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus ? ');"><i class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
</div>
<!-- /.container-fluid -->

<?= $this->endSection(''); ?>