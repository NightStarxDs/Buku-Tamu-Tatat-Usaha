<?php
require 'auth.php';
require 'koneksi.php';
include 'dashboard_template/header.php';
?>

<div id="wrapper">
    <?php include 'dashboard_template/sidebar.php'; ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include 'dashboard_template/topbar.php'; ?>

            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                <?php include 'dashboard_template/content.php'; ?>
            </div>
        </div>

        <?php include 'dashboard_template/footer.php'; ?>
    </div>
</div>
