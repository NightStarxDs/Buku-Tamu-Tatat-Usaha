<?php
require 'auth.php';
require 'koneksi.php';

$q1 = mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM visit_data 
    WHERE YEAR(visit_date) = YEAR(CURDATE()) 
      AND status = 'Done'
");
$pengunjung_tahunan = mysqli_fetch_assoc($q1)['total'] ?? 0;

$q2 = mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM visit_data 
    WHERE MONTH(visit_date) = MONTH(CURDATE())
      AND YEAR(visit_date) = YEAR(CURDATE())
      AND status = 'Done'
");
$pengunjung_bulanan = mysqli_fetch_assoc($q2)['total'] ?? 0;

$q3 = mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM visit_data 
    WHERE status IN ('Upcoming','Now','Close')
");
$akan_datang = mysqli_fetch_assoc($q3)['total'] ?? 0;

$q4 = mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM visit_data 
    WHERE status = 'Pending'
");
$pending = mysqli_fetch_assoc($q4)['total'] ?? 0;
?>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Pengunjung Tahunan
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= $pengunjung_tahunan ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Pengunjung Bulanan
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= $pengunjung_bulanan ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    Kunjungan Akan Datang
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= $akan_datang ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Pending Kunjungan
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= $pending ?>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Tahunan</h6>
            </div>
            <div class="card-body">
                <canvas id="myBarChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Bulanan</h6>
            </div>
            <div class="card-body">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </div>
</div>
