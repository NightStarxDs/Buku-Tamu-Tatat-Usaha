<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pengunjung Tahunan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $sql = "SELECT COUNT(*) AS pengunjung_tahunan
                                                        FROM visit_data
                                                        WHERE YEAR(visit_date) = YEAR(CURDATE())
                                                        AND status = 'Done'
                                                        ";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_assoc($query);
                            echo $data['pengunjung_tahunan'];
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pengunjung Bulanan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pengunjung Bulanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $sql = "SELECT COUNT(*) AS pengunjung_mingguan
                                                        FROM visit_data
                                                        WHERE MONTH(visit_date) = MONTH(CURDATE())
                                                        AND status = 'Done'
                                                        ";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_assoc($query);
                            echo $data['pengunjung_mingguan'];
                            ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kunjungan akan datang
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT COUNT(*) as akan_datang FROM visit_data WHERE `status` IN ('Upcoming', 'Close', 'Now')";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                    echo $data['akan_datang'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Kunjungan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $sql = "SELECT COUNT(*) as pending_kunjungan FROM visit_data WHERE `status` = 'Pending'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_assoc($query);
                            echo $data['pending_kunjungan'];
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Export Laporan Kunjungan</h6>
            </div>
            <div class="card-body">
                <form action="export_handler.php" method="POST" target="_blank">
                    <div class="form-row align-items-end">

                        <div class="col-md-3 mb-3">
                            <label for="periode">Periode</label>
                            <select class="form-control" name="periode" id="periode" onchange="checkCustomDate()">
                                <option value="minggu_ini">Minggu Ini</option>
                                <option value="bulan_ini" selected>Bulan Ini</option>
                                <option value="tahun_ini">Tahun Ini</option>
                                <option value="custom">Pilih Tanggal Sendiri (Custom)</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3 d-none" id="custom_start_box">
                            <label for="start_date">Dari Tanggal</label>
                            <input type="date" class="form-control" name="start_date" id="start_date">
                        </div>
                        <div class="col-md-3 mb-3 d-none" id="custom_end_box">
                            <label for="end_date">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="end_date" id="end_date">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="format">Format</label>
                            <select class="form-control" name="format">
                                <option value="excel">Excel (.xlsx)</option>
                                <option value="pdf">PDF (.pdf)</option>
                            </select>
                        </div>

                        <div class="col-md-1 mb-3">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-download fa-sm"></i> Export
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function checkCustomDate() {
        var periode = document.getElementById("periode").value;
        var startBox = document.getElementById("custom_start_box");
        var endBox = document.getElementById("custom_end_box");

        if (periode === "custom") {
            startBox.classList.remove("d-none");
            endBox.classList.remove("d-none");
            startBox.setAttribute("required", ""); // Tambah required jika custom
            endBox.setAttribute("required", "");
        } else {
            startBox.classList.add("d-none");
            endBox.classList.add("d-none");
            startBox.removeAttribute("required");
            endBox.removeAttribute("required");
        }
    }
</script>
<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Tahunan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Bulanan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Senin
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Selasa
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Rabu
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Kamis
                    </span>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Jumat
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i> Sabtu
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-dark"></i> Minggu
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>