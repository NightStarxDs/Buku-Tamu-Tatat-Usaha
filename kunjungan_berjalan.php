<?php
// Tampilkan semua error supaya tidak layar putih
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'auth.php';
require 'koneksi.php';

// Pastikan koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Base URL untuk CSS/JS (ubah jika dijalankan di subfolder)
$base_url = '/Buku-Tamu-Tata-Usaha/';

include 'dashboard_template/header.php';
?>                  

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'dashboard_template/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include 'dashboard_template/topbar.php'; ?>

            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Data Kunjungan</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan (Upcoming / Close / Now / Done)</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%">
                                <thead class="bg-primary text-white">
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
$sql = "SELECT * FROM visit_data ORDER BY id DESC";
$result = mysqli_query($koneksi, $sql) or die("Query error: " . mysqli_error($koneksi));

$tz = new DateTimeZone('Asia/Jakarta');
$closeThreshold = 86400; // 24 jam

while ($data = mysqli_fetch_assoc($result)) {

    // Ambil data dan cek kosong
    $visitDate   = $data['visit_date'] ?? null;
    $startTime   = $data['waktu_datang'] ?? null;
    $endTime     = $data['waktu_pulang'] ?? null;

    $now = new DateTime('now', $tz);

    if ($visitDate && $startTime && $endTime) {
        $in  = new DateTime("$visitDate $startTime", $tz);
        $out = new DateTime("$visitDate $endTime", $tz);
        if ($out <= $in) $out->modify('+1 day');

        if ($now >= $out) {
            $status = 'Done';
        } elseif ($now >= $in) {
            $status = 'Now';
        } elseif (($in->getTimestamp() - $now->getTimestamp()) <= $closeThreshold) {
            $status = 'Close';
        } else {
            $status = 'Upcoming';
        }

    } else {
        $status = 'Upcoming';
    }

    // Update status jika berubah
    if ($status !== $data['status']) {
        mysqli_query($koneksi, "UPDATE visit_data SET status='$status' WHERE id=".(int)$data['id'])
            or die("Update Error: " . mysqli_error($koneksi));
    }

    // Pilih warna badge
    $badge = [
        'Upcoming' => 'primary',
        'Close'    => 'danger',
        'Now'      => 'warning',
        'Done'     => 'success'
    ][$status] ?? 'secondary';

    $id       = (int)$data['id'];
    $nama     = htmlspecialchars($data['nama_tamu']);
    $instansi = htmlspecialchars($data['instansi']);
    $perihal  = htmlspecialchars($data['perihal']);
    $tglwkt   = $visitDate && $startTime ? date('d/m/Y H:i', strtotime("$visitDate $startTime")) : '-';
?>

<tr>
    <td><?= $nama ?></td>
    <td><?= $instansi ?></td>
    <td><?= $perihal ?></td>
    <td><?= $tglwkt ?></td>
    <td class="text-center">
        <span class="badge badge-<?= $badge ?> p-2"><?= $status ?></span>
    </td>
    <td class="text-center">
        <a href="edit.php?id=<?= $id ?>" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
        </a>
        <a href="info.php?id=<?= $id ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-eye"></i>
        </a>
        <a href="proses_hapus.php?id=<?= $id ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>

<?php } ?>

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

<!-- CSS/JS -->
<link rel="stylesheet" href="<?= $base_url ?>../dashboard_template/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= $base_url ?>../dashboard_template/css/fontawesome.min.css">
<script src="<?= $base_url ?>../dashboard_template/js/jquery.min.js"></script>
<script src="<?= $base_url ?>../dashboard_template/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>../dashboard_template/js/fontawesome.min.js"></script>
