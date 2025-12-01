<?php include 'dashboard_template/header.php'; ?>

<body class="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'dashboard_template/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include 'dashboard_template/topbar.php'; ?>

                <!-- Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Kunjungan</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan (Upcoming)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead bg-primary text-white fw-bold">
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
                                        $sql = "SELECT * FROM visit_data WHERE `status` IN ('Upcoming','Close','Now') ORDER BY id DESC";
                                        $result = mysqli_query($koneksi, $sql);
                                        if (!$result) {
                                            echo '<tr><td colspan="7">Query error: ' . htmlspecialchars(mysqli_error($koneksi)) . '</td></tr>';
                                        } else {
                                            $tz = new DateTimeZone('Asia/Jakarta');
                                            $closeThreshold = 24 * 3600; // 24 jam

                                            while ($data = mysqli_fetch_assoc($result)) {
                                                $now = new DateTime('now', $tz);

                                                $in = DateTime::createFromFormat('Y-m-d H:i:s', $data['visit_date'] . ' ' . ($data['time_in'] ?: '00:00:00'), $tz);
                                                if (!$in) $in = new DateTime($data['visit_date'] . ' ' . $data['time_in'], $tz);

                                                $out = DateTime::createFromFormat('Y-m-d H:i:s', $data['visit_date'] . ' ' . ($data['time_out'] ?: '00:00:00'), $tz);
                                                if (!$out) $out = new DateTime($data['visit_date'] . ' ' . $data['time_out'], $tz);

                                                if ($out <= $in) $out->modify('+1 day');

                                                $newStatus = $data['status'];

                                                if ($now >= $out) {
                                                    $newStatus = 'Done';
                                                } elseif ($now >= $in && $now < $out) {
                                                    $newStatus = 'Now';
                                                } else {
                                                    $secondsToIn = $in->getTimestamp() - $now->getTimestamp();
                                                    if ($secondsToIn > 0 && $secondsToIn <= $closeThreshold) {
                                                        $newStatus = 'Close';
                                                    } else {
                                                        $newStatus = 'Upcoming';
                                                    }
                                                }

                                                // Debug setelah Verifikasi
                                                if ($newStatus !== $data['status']) {
                                                    $safeStatus = mysqli_real_escape_string($koneksi, $newStatus);
                                                    $id = (int)$data['id'];
                                                    mysqli_query($koneksi, "UPDATE visit_data SET `status` = '{$safeStatus}' WHERE id = {$id}");
                                                    $data['status'] = $newStatus;
                                                }

                                                // Pemetaan badge
                                                $badgeClass = 'badge-info';
                                                if ($data['status'] === 'Now') $badgeClass = 'badge-warning';
                                                if ($data['status'] === 'Done') $badgeClass = 'badge-success';
                                                if ($data['status'] === 'Close') $badgeClass = 'badge-danger';
                                                if ($data['status'] === 'Upcoming') $badgeClass = 'badge-primary';
                                        ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($data['guest_name']); ?></td>
                                                    <td><?= htmlspecialchars($data['company_name']); ?></td>
                                                    <td><?= htmlspecialchars($data['visit_desc']); ?></td>
                                                    <td><?= date('d/m/Y', strtotime($data['visit_date'])); ?> <span><?= date('H:i', strtotime($data['time_in'])); ?></span></td>
                                                    <td class="text-center">
                                                        <span class="badge <?= $badgeClass ?>" style="padding: 10px; font-size: 15px;">
                                                            <?= htmlspecialchars($data['status']); ?>
                                                        </span>
                                                    </td>
                                                    <td class="d-flex justify-content-between">
                                                        <a href="edit.php?id=<?= (int)$data['id'] ?>" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include 'dashboard_template/footer.php'; ?>


</body>