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
                        <h1 class="h3 mb-0 text-gray-800">Data Kunjungan</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kunjungan (Pending)</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead bg-warning text-white fw-bold">
                                        <tr>
                                            <th>Tamu</th>
                                            <th>Instansi</th>
                                            <th>Perihal </th>
                                            <th>Tanggal & Waktu </th>
                                            <th>Staf / Unit</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT 
                                                    visit_data.*,
                                                    staf.staf_name,
                                                    unit.unit_name
                                                FROM 
                                                    visit_data
                                                LEFT JOIN staf ON visit_data.id_staf = staf.id_staf
                                                LEFT JOIN unit ON visit_data.id_unit = unit.id_unit
                                                WHERE 
                                                    visit_data.`status` = 'Pending' 
                                                ORDER BY 
                                                    visit_data.id DESC";

                                        $query = mysqli_query($koneksi, $sql);
                                        foreach ($query as $data) {
                                        ?>
                                            <tr>
                                                <td><?= htmlspecialchars($data['guest_name']); ?></td>
                                                <td><?= htmlspecialchars($data['company_name']); ?></td>
                                                <td><?= $data['visit_desc'] ?></td>
                                                <td><?= date('d/m/Y', strtotime($data['visit_date'])); ?> <span><?= date('H:i', strtotime($data['time_in'])); ?></span></td>
                                                <td><?= !empty($data['staf_name']) ? htmlspecialchars($data['staf_name']) : htmlspecialchars($data['unit_name']); ?></td>
                                                <td class="d-flex justify-content-between">
                                                    <a href="info.php?id=<?= $data['id'] ?>" class="btn btn-primary btn-sm" title="Info"><i class=" fas fa-eye"></i></a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menerima data ini?')" href="proses_terima.php?id=<?= $data['id']; ?>" class="btn btn-success btn-sm" title="Terima"><i class="fas fa-check"></i></a>
                                                    <a onclick="return confirm('Apakah anda yakin ingin menolak data ini?')" href="proses_tolak.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" title="Tolak"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of container-fluid -->
                
            </div>
            <!-- End of content -->
            
            <!-- Footer harus di sini, SETELAH content tapi DALAM content-wrapper -->
            <?php include 'dashboard_template/footer.php'; ?>
            
        </div>
        <!-- End of content-wrapper -->
        
    </div>
    <!-- End of wrapper -->
    
</body>