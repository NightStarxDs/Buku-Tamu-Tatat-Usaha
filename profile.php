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
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>
                    <div class="card card-head">
                        <div class="card card-body">
                            <div class="parent">
                                <div class="div1">Hello</div>
                                <div class="div5">Hello</div>
                                <div class="div6">Hello</div>
                                <div class="div7">Hello</div>
                                <div class="div8">Hello</div>
                                <div class="div9">Hello</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'dashboard_template/footer.php'; ?>


</body>