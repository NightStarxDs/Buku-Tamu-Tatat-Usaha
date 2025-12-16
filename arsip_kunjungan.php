<?php include 'dashboard_template/header.php'; ?>
<?php
$delete_sql = "DELETE FROM visit_data 
               WHERE `status` = 'Rejected' 
               AND DATE(visit_date) < DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
mysqli_query($koneksi, $delete_sql);
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

                <!-- Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Arsip Data Kunjungan</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Arsip Kunjungan (Rejected)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead bg-danger text-white fw-bold">
                                        <tr>
                                            <th>Tamu</th>
                                            <th>Instansi</th>
                                            <th>Perihal </th>
                                            <th>Tanggal & Waktu</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM visit_data WHERE `status` = 'Rejected' ORDER BY id DESC";
                                        $query = mysqli_query($koneksi, $sql);
                                        foreach ($query as $data) {
                                        ?>
                                            <tr>
                                                <td><?= $data['guest_name']; ?></td>
                                                <td><?= $data['company_name']; ?></td>
                                                <td><?= $data['visit_desc']; ?></td>
                                                <td><?= date('d/m/Y', strtotime($data['visit_date'])); ?> <span><?= date('H:i', strtotime($data['time_in'])); ?></span></td>
                                                <td class="text-center">
                                                    <span class="badge badge-danger" style="padding: 10px; font-size: 15px;">
                                                        <?= $data['status']; ?>
                                                    </span>
                                                </td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="info.php?id=<?= $data['id'] ?>" class="btn btn-primary btn-sm" title="Info">
                                                        <i class=" fas fa-eye"></i>
                                                    </a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="proses_hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="confirm('Apakah Anda Yakin ingin Menghapus Data ini?')">
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
                <!-- End of container-fluid -->
                
            </div>
            <!-- End of content -->
            
            <!-- Footer harus di sini, SETELAH content tapi DALAM content-wrapper -->
            <?php include 'dashboard_template/footer.php'; ?>
            
        </div>
        <!-- End of content-wrapper -->
        
    </div>
    <!-- End of wrapper -->
    
</body>
