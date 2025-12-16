<?php
include 'dashboard_template/header.php';
include 'koneksi.php';

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$sql = "SELECT 
            visit_data.*,
            staf.*,
            unit.*
        FROM 
            visit_data
        LEFT JOIN staf ON visit_data.id_staf = staf.id_staf
        LEFT JOIN unit ON visit_data.id_unit = unit.id_unit
        WHERE 
            visit_data.`id` = '$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

// Data dasar untuk pesan
$guest_name = $data['nama_tamu'] ?? 'Pengunjung';
$time_in = $data['waktu_datang'] ?? 'Tidak Diketahui';
$visit_desc = $data['perihal'] ?? 'Tidak ada deskripsi kunjungan';
$visit_regards = $data[''] ?? 'Permintaan Kunjungan';

// Menentukan Staf/Unit untuk mengisi pesan otomatis
$target_name = '';
$target_email_recipient = '';
$target_phone = '';

if (!empty($data['id_staf'])) {
    $target_name = 'Bapak/Ibu ' . ($data['staf_name'] ?? 'Staf Ybs');
    $target_email_recipient = $data['staf_email'] ?? '';
    $target_phone = $data['staf_number'] ?? '';
} elseif (!empty($data['id_unit'])) {
    $target_name = 'Unit ' . ($data['unit_name'] ?? 'Unit Ybs');
    $target_email_recipient = $data['unit_email'] ?? '';
    $target_phone = $data['unit_number'] ?? '';
}

// Susunan isi pesan (Body)
$raw_message = "*Pesan Otomatis dari Sistem Kunjungan*\n\n";
$raw_message = "Kepada Yang terhormat Bapak/Ibu {$target_name}\n\n";
$raw_message .= "{$guest_name} ingin mengunjungi Bapak/Ibu pada pukul {$time_in}.\n";
$raw_message .= "Dengan tujuan: {$visit_desc}\n\n";
$raw_message .= "Apabila Bapak/Ibu tidak berkenan, mohon balas \"Tidak bisa\" disertai dengan alasannya. Apabila berkenan, mohon balas \"Bisa\" Dengan mencantumkan ruangan pertemuan.";

// URL Encode untuk tautan
$encoded_body = urlencode($raw_message);
$encoded_subject = urlencode($visit_regards);

// Tautan WhatsApp dan Email
$clean_target_phone = preg_replace('/[^0-9]/', '', $target_phone);

// Tautan WhatsApp: dengan pesan otomatis
$target_whatsapp_link = "https://wa.me/{$clean_target_phone}?text={$encoded_body}";

// Tautan Email: URL spesifik Gmail dengan subjek dan body otomatis
$target_gmail_link = "https://mail.google.com/mail/?view=cm&fs=1&to={$target_email_recipient}&su={$encoded_subject}&body={$encoded_body}";

// Tautan kontak Pengunjung
$clean_visitor_phone = preg_replace('/[^0-9]/', '', ($data['phone_number'] ?? ''));
?>

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
                        <h1 class="h3 mb-0 text-gray-800">Info Data Kunjungan</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary">
                            <h6 class="m-0 font-weight-bold text-white">Detail Kunjungan</h6>
                        </div>
                        <div class="card-body py-3">
                            <!-- Detail Pengunjung -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="guest_name">Nama Pengunjung</label>
                                    <input type="text" class="form-control" name="guest_name" id="guest_name" value="<?= ($data['guest_name'] ?? ''); ?>" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="company_name">Nama Instansi</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" value="<?= ($data['company_name'] ?? ''); ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Alamat Email Pengunjung</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email" value="<?= ($data['email'] ?? ''); ?>" readonly>
                                        <div class="input-group-append">
                                            <!-- Tautan mailto sederhana untuk pengunjung -->
                                            <a href="mailto:<?= ($data['email'] ?? ''); ?>" class="btn btn-outline-primary" title="Kirim Email" aria-label="Kirim Email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone_number">No. Telepon Pengunjung</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?= ($data['phone_number'] ?? ''); ?>" readonly>
                                        <div class="input-group-append">
                                            <!-- Tautan WhatsApp untuk pengunjung -->
                                            <a href="https://wa.me/<?= $clean_visitor_phone; ?>" target="_blank" class="btn btn-success" title="Hubungi via WhatsApp" aria-label="WhatsApp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Waktu Kunjungan -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="visit_date">Tanggal Kunjungan</label>
                                    <input type="date" class="form-control" name="visit_date" id="visit_date" value="<?= ($data['visit_date'] ?? ''); ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="time_display">Waktu Mulai - Selesai</label>
                                    <!-- Menampilkan waktu dalam satu input -->
                                    <input type="text" class="form-control" name="time_display" id="time_display" value="<?= ($data['time_in'] ?? ''); ?> - <?= ($data['time_out'] ?? ''); ?>" readonly>
                                </div>
                            </div>

                            <!-- Perihal Kunjungan dan Target (Staf/Unit) - Struktur Asli -->
                            <div class="form-row">
                                <?php
                                if (!empty($data['id_staf'])) { ?>
                                    <div class="form-group col-md-6">
                                        <label for="visit_regards">Perihal Kunjungan</label>
                                        <input class="form-control" name="visit_regards" id="visit_regards" value="<?= ($data['visit_regards'] ?? ''); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="staf_name">Staf Dituju</label>
                                        <input class="form-control" name="staf_name" id="staf_name" value="<?= ($data['staf_name'] ?? ''); ?>" readonly>
                                    </div>
                                <?php
                                } elseif (!empty($data['id_unit'])) { ?>
                                    <div class="form-group col-md-6">
                                        <label for="visit_regards">Perihal Kunjungan</label>
                                        <input class="form-control" name="visit_regards" id="visit_regards" value="<?= ($data['visit_regards'] ?? ''); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="unit_name">Unit Dituju</label>
                                        <input class="form-control" name="unit_name" id="unit_name" value="<?= ($data['unit_name'] ?? ''); ?>" readonly>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="form-group col-md-12">
                                        <label for="visit_regards">Perihal Kunjungan</label>
                                        <input class="form-control" name="visit_regards" id="visit_regards" value="<?= ($data['visit_regards'] ?? ''); ?>" readonly>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Detail Kontak Target (Staf/Unit) dengan Pesan Otomatis -->
                            <div class="form-row">
                                <?php
                                if (!empty($data['id_staf'])) { ?>
                                    <div class="form-group col-md-6">
                                        <label for="staf_email">Email Staf</label>
                                        <div class="input-group">
                                            <input class="form-control" name="staf_email" id="staf_email" value="<?= ($data['staf_email'] ?? ''); ?>" readonly>
                                            <div class="input-group-append">
                                                <!-- Tautan Gmail dengan pre-filled content -->
                                                <a href="<?= $target_gmail_link; ?>" target="_blank" class="btn btn-outline-primary" title="Kirim Email (Gmail) dengan pesan otomatis" aria-label="Kirim Email">
                                                    <i class="fas fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="staf_number">No. Telepon Staf</label>
                                        <div class="input-group">
                                            <input class="form-control" name="staf_number" id="staf_number" value="<?= ($data['staf_number'] ?? ''); ?>" readonly>
                                            <div class="input-group-append">
                                                <!-- Tautan WhatsApp dengan pesan otomatis -->
                                                <a href="<?= $target_whatsapp_link; ?>" target="_blank" class="btn btn-success" title="Hubungi via WhatsApp dengan pesan otomatis" aria-label="WhatsApp">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php } elseif (!empty($data['id_unit'])) { ?>
                                    <div class="form-group col-md-6">
                                        <label for="unit_email">Email Unit</label>
                                        <div class="input-group">
                                            <input class="form-control" name="unit_email" id="unit_email" value="<?= ($data['unit_email'] ?? ''); ?>" readonly>
                                            <div class="input-group-append">
                                                <!-- Tautan Gmail dengan pre-filled content -->
                                                <a href="<?= $target_gmail_link; ?>" target="_blank" class="btn btn-outline-primary" title="Kirim Email (Gmail) dengan pesan otomatis" aria-label="Kirim Email">
                                                    <i class="fas fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="unit_number">No. Telepon Unit</label>
                                        <div class="input-group">
                                            <input class="form-control" name="unit_number" id="unit_number" value="<?= ($data['unit_number'] ?? ''); ?>" readonly>
                                            <div class="input-group-append">
                                                <!-- Tautan WhatsApp dengan pesan otomatis -->
                                                <a href="<?= $target_whatsapp_link; ?>" target="_blank" class="btn btn-success" title="Hubungi via WhatsApp dengan pesan otomatis" aria-label="WhatsApp">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>


                            <div class="form-group">
                                <label for="visit_desc">Deskripsi Kunjungan</label>
                                <textarea class="form-control" name="visit_desc" id="visit_desc" rows="4" readonly><?= ($data['visit_desc'] ?? ''); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" name="status" id="status" value="<?= ($data['status'] ?? ''); ?>" readonly>
                            </div>

                            <div class="form-row">
                                <div class="form-group mt-3 w-100 d-flex justify-content-between">
                                    <a href="kunjungan_selesai.php" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include 'dashboard_template/footer.php'; ?>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div>
    <!-- /#wrapper -->

</body>

</html>