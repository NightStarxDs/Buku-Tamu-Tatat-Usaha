<?php include 'dashboard_template/header.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-white">Edit Data Kunjungan</h6>
                        </div>
                        <div class="card-body py-3">
                            <form action="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_tamu">Nama Pengunjung</label>
                                        <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" value="<?= $data['nama_tamu'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Alamat Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telepon">No. Telepon</label>
                                        <input type="tel" class="form-control" name="telepon" id="telepon" value="<?= $data['telepon'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="instansi">Nama Instansi</label>
                                        <input type="text" class="form-control" name="instansi" id="instansi" value="<?= $data['instansi'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="visit_regards">Perihal Kunjungan</label>
                                    <textarea class="form-control" name="perihal" id="perihal" rows="3"><?= $data['perihal'] ?></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="visit_date">Tanggal Kunjungan</label>
                                        <input type="date" class="form-control" name="visit_date" id="visit_date" value="<?= $data['visit_date'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Pending" <?= $data['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="Done" <?= $data['status'] === 'Done' ? 'selected' : '' ?>>Done</option>
                                            <option value="Upcoming" <?= $data['status'] === 'Upcoming' ? 'selected' : '' ?>>Upcoming</option>
                                            <option value="Close" <?= $data['status'] === 'Close' ? 'selected' : '' ?>>Close</option>
                                            <option value="Now" <?= $data['status'] === 'Now' ? 'selected' : '' ?>>Now</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="waktu_datang">Waktu Mulai</label>
                                        <input type="time" class="form-control" name="waktu_datang" id="waktu_datang" value="<?= $data['waktu_datang']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="waktu_pulang">Waktu Selesai</label>
                                        <input type="time" class="form-control" name="waktu_pulang" id="waktu_pulang" value="<?= $data['waktu_pulang']; ?>">
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <a href="data_kunjungan.php" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary px-3">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <?php include 'dashboard_template/footer.php'; ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div>
    <!-- /#wrapper -->

</body>

</html>