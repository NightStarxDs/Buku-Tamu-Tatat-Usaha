<?php 
include 'koneksi.php'; // Pastikan koneksi disertakan
include 'dashboard_template/header.php'; 

// 1. Ambil ID dan Validasi agar tidak Error
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("<script>alert('ID tidak valid!'); window.location='kunjungan_berjalan.php';</script>");
}

// 2. Query data
$sql = "SELECT * FROM visit_data WHERE id = $id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

if (!$data) {
    die("<script>alert('Data tidak ditemukan!'); window.location='kunjungan_berjalan.php';</script>");
}
?>

<body class="page-top">
    <div id="wrapper">
        <?php include 'dashboard_template/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'dashboard_template/topbar.php'; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-warning">
                            <h6 class="m-0 font-weight-bold text-white">Edit Data Kunjungan</h6>
                        </div>
                        <div class="card-body py-3">
                            <form action="edit.php" method="POST">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="guest_name">Nama Pengunjung</label>
                                        <input type="text" class="form-control" name="guest_name" id="guest_name" value="<?= $data['guest_name'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Alamat Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone_number">No. Telepon</label>
                                        <input type="tel" class="form-control" name="phone_number" id="phone_number" value="<?= $data['phone_number'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="company_name">Nama Instansi</label>
                                        <input type="text" class="form-control" name="company_name" id="company_name" value="<?= $data['company_name'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="visit_regards">Perihal Kunjungan (Enum)</label>
                                    <select class="form-control" name="visit_regards" required>
                                        <option value="Urusan_surat" <?= $data['visit_regards'] == 'Urusan_surat' ? 'selected' : '' ?>>Urusan Surat</option>
                                        <option value="Urusan_keuangan" <?= $data['visit_regards'] == 'Urusan_keuangan' ? 'selected' : '' ?>>Urusan Keuangan</option>
                                        <option value="Urusan_umum" <?= $data['visit_regards'] == 'Urusan_umum' ? 'selected' : '' ?>>Urusan Umum</option>
                                        <option value="Urusan_sarana" <?= $data['visit_regards'] == 'Urusan_sarana' ? 'selected' : '' ?>>Urusan Sarana</option>
                                        <option value="Janji_temu_unit" <?= $data['visit_regards'] == 'Janji_temu_unit' ? 'selected' : '' ?>>Janji Temu Unit</option>
                                        <option value="Janji_temu_staf" <?= $data['visit_regards'] == 'Janji_temu_staf' ? 'selected' : '' ?>>Janji Temu Staf</option>
                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="visit_date">Tanggal Kunjungan</label>
                                        <input type="date" class="form-control" name="visit_date" value="<?= $data['visit_date'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Pending" <?= $data['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="Upcoming" <?= $data['status'] === 'Upcoming' ? 'selected' : '' ?>>Upcoming</option>
                                            <option value="Done" <?= $data['status'] === 'Done' ? 'selected' : '' ?>>Done</option>
                                            <option value="Close" <?= $data['status'] === 'Close' ? 'selected' : '' ?>>Close</option>
                                            <option value="Now" <?= $data['status'] === 'Now' ? 'selected' : '' ?>>Now</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="time_in">Waktu Mulai</label>
                                        <input type="time" class="form-control" name="time_in" value="<?= $data['time_in']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="time_out">Waktu Selesai</label>
                                        <input type="time" class="form-control" name="time_out" value="<?= $data['time_out']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <a href="kunjungan_berjalan.php" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" name="update" class="btn btn-primary px-3">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php include 'dashboard_template/footer.php'; ?>
            </div>
        </div>
    </div>
</body>
</html>