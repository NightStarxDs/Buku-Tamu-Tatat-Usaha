                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengunjung Bulanan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'koneksi.php';
                                                $sql = "SELECT COUNT(*) as pengujung_bulanan FROM visit_data WHERE" . " MONTH(visit_date) = MONTH(CURDATE()) AND STATUS = 'Done'";
                                                $query = mysqli_query($koneksi, $sql);
                                                $data = mysqli_fetch_assoc($query);
                                                echo $data['pengujung_bulanan'];
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
                                                Pengunjung Mingguan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'koneksi.php';
                                                $sql = "SELECT COUNT(*) as pengujung_mingguan FROM visit_data WHERE WEEK(visit_date) = WEEK(CURDATE()) AND STATUS = 'Done'";
                                                $query = mysqli_query($koneksi, $sql);
                                                $data = mysqli_fetch_assoc($query);
                                                echo $data['pengujung_mingguan'];
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
                                                        include 'koneksi.php';
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
                                                include 'koneksi.php';
                                                $sql = "SELECT COUNT(*) as pending_kunjungan FROM visit_data WHERE `status` = 'Pending'";
                                                $query = mysqli_query($koneksi, $sql);
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

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung Bulanan</h6>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung Mingguan</h6>
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