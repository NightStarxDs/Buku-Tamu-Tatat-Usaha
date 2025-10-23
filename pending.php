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
                        <h1 class="h3 mb-0 text-gray-800">Pending Data Kunjungan</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pending Data Kunjungan</h6>
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Rizky Ramadhani</td>
                                            <td>SMKN 4 BATAM</td>
                                            <td>Berkunjung</td>
                                            <td>25-10-2025</td>
                                            <td>Pending</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="#" class="btn btn-success" title="Terima">
                                                    <i class=" fas fa-check px-1"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger" title="Tolak">
                                                    <i class="fas fa-times px-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Muhammad Riswan</td>
                                            <td>SMKN 4 BATAM</td>
                                            <td>Berkunjung</td>
                                            <td>25-10-2025</td>
                                            <td>Pending</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="#" class="btn btn-success" title="Terima">
                                                    <i class=" fas fa-check px-1"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger" title="Tolak">
                                                    <i class="fas fa-times px-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kevin Febriano</td>
                                            <td>SMKN 4 BATAM</td>
                                            <td>Berkunjung</td>
                                            <td>25-10-2025</td>
                                            <td>Pending</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="#" class="btn btn-success" title="Terima">
                                                    <i class=" fas fa-check px-1"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger" title="Tolak">
                                                    <i class="fas fa-times px-2"></i>
                                                </a>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuzan Najib Ali</td>
                                            <td>Politeknik Negeri Batam</td>
                                            <td>Kajian</td>
                                            <td>25-10-2025</td>
                                            <td>Pending</td>
                                            <td class="d-flex justify-content-between">
                                                <a href="#" class="btn btn-success" title="Terima">
                                                    <i class=" fas fa-check px-1"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger" title="Tolak">
                                                    <i class="fas fa-times px-2"></i>
                                                </a>
                                            </td>
                                        </tr>
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