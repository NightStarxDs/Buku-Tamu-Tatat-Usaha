<?php
require 'auth.php';
require 'koneksi.php';
include 'dashboard_template/header.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Arsip Data Kunjungan</title>
    <link rel="stylesheet" href="../dashboard_template/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard_template/css/fontawesome.min.css">
</head>
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
                        <h6 class="m-0 font-weight-bold text-danger">Arsip Kunjungan (Rejected)</h6>
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
                                $sql = "SELECT * FROM visit_data WHERE status = 'Rejected' ORDER BY id DESC";
                                $result = mysqli_query($koneksi, $sql) or die("Query error: " . mysqli_error($koneksi));

                                while ($data = mysqli_fetch_assoc($result)) :
                                    $nama = htmlspecialchars($data['nama_tamu']);
                                    $instansi = htmlspecialchars($data['instansi']);
                                    $perihal = htmlspecialchars($data['perihal']);
                                    $status = htmlspecialchars($data['status']);
                                    $tgl = !empty($data['visit_date']) ? date('d/m/Y', strtotime($data['visit_date'])) : '-';
                                    $waktu = !empty($data['waktu_datang']) ? date('H:i', strtotime($data['waktu_datang'])) : '-';
                                    $id = (int)$data['id'];
                                ?>

                                <tr>
                                    <td><?= $nama; ?></td>
                                    <td><?= $instansi; ?></td>
                                    <td><?= $perihal; ?></td>
                                    <td><?= $tgl . ' ' . $waktu; ?></td>
                                    <td class="text-center">
                                        <span class="badge badge-danger p-2"><?= $status; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="info.php?id=<?= $id; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="proses_hapus.php?id=<?= $id; ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">
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

<script src="../dashboard_template/js/jquery.min.js"></script>
<script src="../dashboard_template/js/bootstrap.bundle.min.js"></script>
<script src="../dashboard_template/js/fontawesome.min.js"></script>
</body>
</html>
