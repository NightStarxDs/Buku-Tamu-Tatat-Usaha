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
                            <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan (Pending)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead bg-warning text-white fw-bold">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nama Instansi</th>
                                            <th>Perihal Kunjungan</th>
                                            <th>Tanggal Kunjungan</th>
                                            <th>Waktu Kunjungan</th>
                                            <th>Staf Dituju</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include 'koneksi.php';
                                        $sql = "SELECT * FROM visit_data WHERE `status` = 'Pending' ORDER BY id DESC";
                                        $query = mysqli_query($koneksi, $sql);
                                        foreach ($query as $data) {
                                        ?>
                                            <tr>
                                                <td><?= $data['guest_name']; ?></td>
                                                <td><?= $data['company_name']; ?></td>
                                                <td><?= ucwords(str_replace('_', ' ', strtolower($data['visit_regards']))) ?></td>
                                                <td><?= $data['visit_date']; ?></td>
                                                <td><?= date('H:i', strtotime($data['time_in'])) ?></td>
                                                <td><?= $data['staf_name'] ?></td>
                                                <td class="text-center">
                                                    <span class="badge badge-warning" style="padding: 10px; font-size: 15px;">
                                                        <?= $data['status']; ?>
                                                    </span>
                                                </td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="?url" class="btn btn-success" title="Terima">
                                                        <i class=" fas fa-check px-1"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger" title="Tolak">
                                                        <i class="fas fa-times px-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
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