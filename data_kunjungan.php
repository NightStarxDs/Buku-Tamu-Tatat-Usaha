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
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div>

                        <table class="table table-bordered table-hover table-condensed">
                            <thead class="thead bg-primary text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Nama Instansi</th>
                                    <th class="text-center">Perihal Kunjungan</th>
                                    <th class="text-center">Tanggal Kunjungan</th>
                                    <th colspan="3" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dwi Agung Willy Anto</td>
                                    <td>SMKN 4 BATAM</td>
                                    <td>Sosialisasi Lingkungan Kampus</td>
                                    <td>25-10-2025</td>
                                    <td><a href="" class="btn btn-primary" title="Info">
                                            <i class=" fas fa-info px-1"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Virgiawan Aziz Listianto</td>
                                    <td>SMKN 4 BATAM</td>
                                    <td>Sosialisasi Lingkungan Kampus</td>
                                    <td>25-10-2025</td>
                                    <td><a href="" class="btn btn-primary" title="Info">
                                            <i class=" fas fa-info px-1"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Zaid Hasbiya Abrar</td>
                                    <td>SMKN 4 BATAM</td>
                                    <td>Sosialisasi Lingkungan Kampus</td>
                                    <td>25-10-2025</td>
                                    <td><a href="" class="btn btn-primary" title="Info">
                                            <i class=" fas fa-info px-1"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Bapak Budi Santoso</td>
                                    <td>Pemerintah Kota Sejahtera</td>
                                    <td>Studi Banding Tata Kelola Pelayanan Publik Berbasis Digital</td>
                                    <td>27-10-2025</td>
                                    <td><a href="" class="btn btn-primary" title="Info">
                                            <i class=" fas fa-info px-1"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Ibu Rina Kusuma</td>
                                    <td>Universitas Maju Bangsa</td>
                                    <td>Kunjungan Industri dan Diskusi Mekanisme Pengawasan Keuangan</td>
                                    <td>28-10-2025</td>
                                    <td><a href="" class="btn btn-primary" title="Info">
                                            <i class=" fas fa-info px-1"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td><a href="" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'dashboard_template/footer.php'; ?>


</body>