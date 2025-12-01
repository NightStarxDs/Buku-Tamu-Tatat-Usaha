<?php include 'dashboard_template/header.php';
include 'koneksi.php';
$id = $_GET['id'];
$sql = "SELECT * FROM visit_data WHERE id = $id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
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
                        <h1 class="h3 mb-0 text-gray-800">Info Data</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0 font-weight-bold text-white">Info Data Kunjungan</h6>
                        </div>
                        <div class="card-body py-3">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="guest_name">Nama Pengunjung</label>
                                    <input type="text" class="form-control" name="guest_name" id="guest_name" value="<?= htmlspecialchars($data['guest_name'] ?? ''); ?>" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="company_name">Nama Instansi</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" value="<?= htmlspecialchars($data['company_name'] ?? ''); ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Alamat Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $data['email']; ?>" readonly>
                                        <div class="input-group-append">
                                            <a class="btn btn-outline-primary" title="Kirim Email" aria-label="Kirim Email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone_number">No. Telepon</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?= $data['phone_number']; ?>" readonly>
                                        <div class="input-group-append">
                                            <a class="btn btn-success" title="Hubungi via WhatsApp" aria-label="WhatsApp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="visit_regards">Perihal Kunjungan</label>
                                    <input class="form-control" name="visit_regards" id="visit_regards" value="<?= htmlspecialchars($data['visit_regards'] ?? ''); ?>" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" name="status" id="status" value="<?= htmlspecialchars($data['status'] ?? ''); ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="visit_desc">Deskripsi Kunjungan</label>
                                <textarea class="form-control" name="visit_desc" id="visit_desc" rows="4" readonly><?= htmlspecialchars($data['visit_desc'] ?? ''); ?></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group mt-3 w-100 d-flex justify-content-between">
                                    <a href="kunjungan_selesai.php" class="btn btn-secondary">Kembali</a>
                                    <a href="#" class="btn btn-outline-success">Export As Excel</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <?php include 'dashboard_template/footer.php'; ?>
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- /#wrapper -->
        </div>
        <!-- /#wrapper -->

</body>

</html>