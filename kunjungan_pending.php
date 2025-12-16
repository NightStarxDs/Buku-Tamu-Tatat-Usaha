<?php
require 'auth.php';
require 'koneksi.php';
include 'dashboard_template/header.php';
?>

<body class="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'dashboard_template/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include 'dashboard_template/topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Data Kunjungan</h1>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Data Kunjungan (Pending)
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <thead class="bg-warning text-white">
                                    <tr>
                                        <th>Tamu</th>
                                        <th>Instansi</th>
                                        <th>Perihal</th>
                                        <th>Tanggal</th>
                                        <th>Staf / Unit</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT *
                                        FROM visit_data
                                        WHERE status = 'Pending'
                                        ORDER BY id DESC";

                                $query = mysqli_query($koneksi, $sql);

                                if ($query && mysqli_num_rows($query) > 0):
                                    while ($data = mysqli_fetch_assoc($query)):
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($data['nama_tamu']); ?></td>
                                        <td><?= htmlspecialchars($data['instansi']); ?></td>
                                        <td><?= htmlspecialchars($data['perihal']); ?></td>
                                        <td><?= date('d/m/Y', strtotime($data['visit_date'])); ?></td>
                                        <td><?= htmlspecialchars($data['id_staf'] ?: $data['id_unit']); ?></td>
                                        <td class="text-center">
                                            <a href="info.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="proses_terima.php?id=<?= $data['id']; ?>"
                                               onclick="return confirm('Terima data ini?')"
                                               class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="proses_tolak.php?id=<?= $data['id']; ?>"
                                               onclick="return confirm('Tolak data ini?')"
                                               class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    endwhile;
                                else:
                                ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Tidak ada data pending
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Page Content -->

        </div>

        <?php include 'dashboard_template/footer.php'; ?>

    </div>
</div>

</body>
</html>
