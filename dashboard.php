<?php include 'dashboard_template/header.php'; ?>

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
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                <?php include 'dashboard_template/content.php'; ?>

                <!-- Footer -->


            </div>
        </div>
        <?php include 'dashboard_template/footer.php'; ?>
    </div>
</div>