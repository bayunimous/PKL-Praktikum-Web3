<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title'] ?></h3>
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/mahasiswa/tambah" class="btn btn-primary mr-2">Tambah Mahasiswa</a>
                    <a href="<?= base_url; ?>/mahasiswa/laporan" class="btn btn-danger mr-2">Laporan Mahasiswa</a>
                    <div class="btn-group mr-2">
                        <a href="<?= base_url; ?>/mahasiswa/lihatlaporan" class="btn btn-warning" target="_blank">Lihat Laporan Mahasiswa</a>
                    </div>
                    <div class="btn-group">
                        <a href="<?= base_url; ?>/mahasiswa/laporanjumlahmhs" class="btn btn-success" target="_blank">Lihat Laporan Jumlah Mahasiswa</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kontak Darurat</th>
                            <th>Program Studi</th>
                            <th>Fakultas</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($data['mahasiswa'] as $row) : ?>
                            <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $row['Nama']; ?></td>
                                <td><?= $row['Alamat']; ?></td>
                                <td><?= date('d-m-Y', strtotime($row['TanggalLahir'])) ?></td>
                                <td><?= $row['JenisKelamin']; ?></td>
                                <td><?= $row['KontakDarurat']; ?></td>
                                <td><?= $row['NamaProgram']; ?></td>
                                <td><?= $row['NamaFakultas']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/mahasiswa/edit/<?= $row['MahasiswaID'] ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= base_url; ?>/mahasiswa/hapus/<?= $row['MahasiswaID'] ?>" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->