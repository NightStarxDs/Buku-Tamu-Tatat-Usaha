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
                                        <label for="nama_pengunjung">Nama Pengunjung</label>
                                        <input type="text" class="form-control" name="nama_pengunjung" id="nama_pengunjung">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email_pengunjung">Alamat Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email_pengunjung" id="email_pengunjung">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nomor_pengunjung">No. Telepon</label>
                                        <input type="tel" class="form-control" name="nomor_pengunjung" id="nomor_pengunjung">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama_instansi">Nama Instansi</label>
                                        <input type="text" class="form-control" name="nama_instansi" id="nama_instansi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="perihal_kunjungan">Perihal Kunjungan</label>
                                    <textarea class="form-control" name="perihal_kunjungan" id="perihal_kunjungan" rows="3"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                                        <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Pilih...</option>
                                            <option value="pending">Pending</option>
                                            <option value="selesai">Selesai</option>
                                            <option value="batal">Batal</option>
                                        </select>
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