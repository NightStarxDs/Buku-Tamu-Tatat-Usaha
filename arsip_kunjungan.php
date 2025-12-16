<?php
require 'auth.php';
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<body class="page-top">

<div id="wrapper">
    <?php include 'dashboard_template/sidebar.php'; ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include 'dashboard_template/topbar.php'; ?>

            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Arsip Data Kunjungan</h1>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger">
                            Arsip Kunjungan (Rejected)
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead class="bg-danger text-white">
                                    <tr>
                                        <th>Tamu</th>
                                        <th>Instansi</th>
                                        <th>Perihal</th>
                                        <th>Tanggal & Waktu</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT * FROM visit_data 
                                        WHERE status = 'Rejected'
                                        ORDER BY id DESC";
                                $result = mysqli_query($koneksi, $sql);

                                while ($data = mysqli_fetch_assoc($result)) :
                                ?>

                                <tr>
                                    <td><?= htmlspecialchars($data['nama_tamu']); ?></td>
                                    <td><?= htmlspecialchars($data['instansi']); ?></td>
                                    <td><?= htmlspecialchars($data['perihal']); ?></td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($data['visit_date'])); ?>
                                        <?= date('H:i', strtotime($data['waktu_datang'])); ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-danger p-2">
                                            <?= $data['status']; ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="info.php?id=<?= $data['id']; ?>" 
                                           class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="proses_hapus.php?id=<?= $data['id']; ?>"
                                           onclick="return confirm('Yakin hapus data ini?')"
                                           class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php endwhile; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php include 'dashboard_template/footer.php'; ?>
    </div>
</div>

</body>
</html>
