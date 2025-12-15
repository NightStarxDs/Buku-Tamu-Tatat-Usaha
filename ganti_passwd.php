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
                        <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
                    </div>
                    <div class="card card-head">
                        <div class="card card-body">
                            <form action="proses_ganti_passwd.php" method="POST" id="changePasswordForm">
                                <div class="form-group">
                                    <label for="password_lama">Password Lama</label>
                                    <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Masukkan Password Lama" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Masukkan Password Baru (Minimal 6 Karakter)" required minlength="6">
                                </div>
                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                                    <input type="password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password Baru" required>
                                    <small id="passwordMatch" class="form-text"></small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Ubah Password</button>
                                    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const passwordBaru = document.getElementById('password_baru');
                                    const konfirmasiPassword = document.getElementById('konfirmasi_password');
                                    const passwordMatch = document.getElementById('passwordMatch');
                                    const submitBtn = document.getElementById('submitBtn');
                                    const form = document.getElementById('changePasswordForm');

                                    function checkPasswordMatch() {
                                        if (konfirmasiPassword.value === '') {
                                            passwordMatch.textContent = '';
                                            passwordMatch.className = 'form-text';
                                            submitBtn.disabled = true;
                                        } else if (passwordBaru.value === konfirmasiPassword.value) {
                                            passwordMatch.textContent = '✓ Password cocok';
                                            passwordMatch.className = 'form-text text-success';
                                            submitBtn.disabled = false;
                                        } else {
                                            passwordMatch.textContent = '✗ Password tidak cocok';
                                            passwordMatch.className = 'form-text text-danger';
                                            submitBtn.disabled = true;
                                        }
                                    }

                                    passwordBaru.addEventListener('keyup', checkPasswordMatch);
                                    konfirmasiPassword.addEventListener('keyup', checkPasswordMatch);

                                    form.addEventListener('submit', function(e) {
                                        if (passwordBaru.value !== konfirmasiPassword.value) {
                                            e.preventDefault();
                                            alert('Password tidak cocok!');
                                            return false;
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'dashboard_template/footer.php'; ?>


</body>