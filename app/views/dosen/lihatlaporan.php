<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="center" style="text-decoration: underline;margin-top: 20px;">Lihat Laporan Dosen</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%; background-color: #f4f6f9;">#</th>
                                    <th style="width: 20%; background-color: #f4f6f9;">Nama Dosen</th>
                                    <th style="width: 20%; background-color: #f4f6f9;">Alamat</th>
                                    <th style="width: 10%; background-color: #f4f6f9;">Tanggal Lahir</th>
                                    <th style="width: 10%; background-color: #f4f6f9;">Jenis Kelamin</th>
                                    <th style="width: 15%; background-color: #f4f6f9;">Kontak</th>
                                    <th style="width: 20%; background-color: #f4f6f9;">Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>
                                <?php foreach ($data['dosen'] as $row) : ?>
                                    <tr>
                                        <td><?= $counter; ?></td>
                                        <td><?= $row['Nama']; ?></td>
                                        <td><?= $row['Alamat']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($row['TanggalLahir'])); ?></td>
                                        <td><?= $row['JenisKelamin']; ?></td>
                                        <td><?= $row['Kontak']; ?></td>
                                        <td><?= $row['NamaProgram']; ?></td>
                                    </tr>
                                    <?php $counter++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- CSS untuk mengatur tampilan tabel -->
<style>
    .center {
        text-align: center;
    }

    .content-header {
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        border: 1px solid #dee2e6;
    }
</style>