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
                            <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead bg-primary text-white fw-bold">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nama Instansi</th>
                                            <th>Perihal Kunjungan</th>
                                            <th>Tanggal Kunjungan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dwi Agung Willy Anto</td>
                                            <td>SMKN 4 BATAM</td>
                                            <td>Sosialisasi</td>
                                            <td>25-10-2025</td>
                                            <td class="text-center"><span class="text-white bg-info px-1 rounded">Upcoming</span></td>
                                            <td class="d-flex justify-content-between">
                                                <a href="info.php" class="btn btn-primary" title="Info">
                                                    <i class=" fas fa-info px-1"></i>
                                                </a>
                                                <a href="edit.php" class="btn btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="" class="btn btn-danger" title="Hapus" onclick="confirm('Apakah Anda Yakin ingin Menghapus Data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Virgiawan Aziz Listianto</td>
                                            <td>SMKN 4 BATAM</td>
                                            <td>Sosialisasi</td>
                                            <td>25-10-2025</td>
                                            <td class="text-center"><span class="text-white bg-info px-1 rounded">Upcoming</span></td>
                                            <td class="d-flex justify-content-between">
                                                <a href="info.php" class="btn btn-primary" title="Info">
                                                    <i class=" fas fa-info px-1"></i>
                                                </a>
                                                <a href="edit.php" class="btn btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="" class="btn btn-danger" title="Hapus" onclick="confirm('Apakah Anda Yakin ingin Menghapus Data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Zaid Hasbiya Abrar</td>
                                            <td>SMKN 4 BATAM</td>
                                            <td>Sosialisasi</td>
                                            <td>25-10-2025</td>
                                            <td class="text-center"><span class="text-white bg-info px-1 rounded">Upcoming</span></td>
                                            <td class="d-flex justify-content-between">
                                                <a href="info.php" class="btn btn-primary" title="Info">
                                                    <i class=" fas fa-info px-1"></i>
                                                </a>
                                                <a href="edit.php" class="btn btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="" class="btn btn-danger" title="Hapus" onclick="confirm('Apakah Anda Yakin ingin Menghapus Data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Safamal Jovanda</td>
                                            <td>Institusi Teknologi Batam</td>
                                            <td>Seminar</td>
                                            <td>25-10-2025</td>
                                            <td class="text-center"><span class="text-white bg-danger px-1 rounded">In Progess</span></td>
                                            <td class="d-flex justify-content-between">
                                                <a href="info.php" class="btn btn-primary" title="Info">
                                                    <i class=" fas fa-info px-1"></i>
                                                </a>
                                                <a href="edit.php" class="btn btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="" class="btn btn-danger" title="Hapus" onclick="confirm('Apakah Anda Yakin ingin Menghapus Data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Arief Han ZK</td>
                                            <td>Institusi Teknologi Batam</td>
                                            <td>Seminar</td>
                                            <td>25-10-2025</td>
                                            <td class="text-center"><span class="text-white bg-success px-1 rounded">Complete</span></td>
                                            <td class="d-flex justify-content-between">
                                                <a href="info.php" class="btn btn-primary" title="Info">
                                                    <i class=" fas fa-info px-1"></i>
                                                </a>
                                                <a href="edit.php" class="btn btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="" class="btn btn-danger" title="Hapus" onclick="confirm('Apakah Anda Yakin ingin Menghapus Data ini?')">
                                                    <i class="fas fa-trash"></i>
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