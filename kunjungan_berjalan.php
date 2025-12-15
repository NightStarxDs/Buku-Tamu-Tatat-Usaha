<?php
require 'koneksi.php';
include 'dashboard_template/header.php';
?>

<?php include 'dashboard_template/sidebar.php'; ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

        <?php include 'dashboard_template/topbar.php'; ?>

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Kunjungan</h1>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan (Upcoming)</h6>
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
$sql = "SELECT * FROM visit_data 
        WHERE status IN ('Upcoming','Close','Now') 
        ORDER BY id DESC";

$result = mysqli_query($koneksi, $sql);

$tz = new DateTimeZone('Asia/Jakarta');
$closeThreshold = 86400;

while ($data = mysqli_fetch_assoc($result)) {

    $now = new DateTime('now', $tz);

    $in  = new DateTime($data['visit_date'].' '.$data['time_in'], $tz);
    $out = new DateTime($data['visit_date'].' '.$data['time_out'], $tz);
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

    if ($status !== $data['status']) {
        mysqli_query($koneksi, "UPDATE visit_data SET status='$status' WHERE id=".$data['id']);
    }

    $badge = [
        'Upcoming' => 'primary',
        'Close'    => 'danger',
        'Now'      => 'warning',
        'Done'     => 'success'
    ][$status];
?>

<tr>
    <td><?= htmlspecialchars($data['guest_name']) ?></td>
    <td><?= htmlspecialchars($data['company_name']) ?></td>
    <td><?= htmlspecialchars($data['visit_desc']) ?></td>
    <td><?= date('d/m/Y H:i', strtotime($data['visit_date'].' '.$data['time_in'])) ?></td>
    <td class="text-center">
        <span class="badge badge-<?= $badge ?> p-2"><?= $status ?></span>
    </td>
    <td class="text-center">
        <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
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
