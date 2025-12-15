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
                    <?php
                    $sql = "SELECT * FROM users WHERE username='$username'";
                    $query = mysqli_query($koneksi, $sql);
                    $data = mysqli_fetch_array($query);

                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ganti Username</h1>
                    </div>
                    <div class="card card-head">
                        <div class="card card-body">
                            <form action="proses_ganti_username.php" method="POST" id="changeUsernameForm">
                                <div class="form-group">
                                    <label for="username_baru">Username Baru</label>
                                    <input type="username" name="username_baru" id="username_baru" class="form-control" placeholder="Masukkan Username Baru">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ubah Username</button>
                                    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'dashboard_template/footer.php'; ?>


</body>