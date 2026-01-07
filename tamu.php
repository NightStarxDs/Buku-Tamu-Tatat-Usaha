<?php include 'koneksi.php' ?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Kunjungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      padding: 1rem;
    }

    .form-container {
      max-width: 900px;
      margin: 0 auto;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      background-color: white;
    }

    .card-header {
      background-color: #09a9a9ff;
      color: white;
      border-radius: 15px 15px 0 0 !important;
      padding: 2rem;
      border: none;
    }

    .card-header h3 {
      margin: 0;
      font-weight: 600;
      font-size: 1.5rem;
    }

    .card-body {
      padding: 2rem;
    }

    .form-label {
      font-weight: 600;
      color: #333;
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }

    .form-control,
    .form-select {
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #20c997;
      box-shadow: 0 0 0 0.2rem rgba(32, 201, 151, 0.25);
    }

    .section-divider {
      border: 0;
      height: 1px;
      background-color: #dee2e6;
      margin: 2rem 0;
    }

    .btn-primary {
      background-color: #09a9a9ff;
      border: none;
      border-radius: 10px;
      padding: 1rem;
      font-size: 1.1rem;
      font-weight: 600;
      transition: all 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #067c7cff;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(32, 201, 151, 0.3);
    }

    .required-field::after {
      content: " *";
      color: #dc3545;
    }

    /* Mobile optimizations */
    @media (max-width: 768px) {
      body {
        padding: 0.5rem;
      }

      .card-header {
        padding: 1.5rem 1rem;
      }

      .card-header h3 {
        font-size: 1.25rem;
      }

      .card-body {
        padding: 1.5rem 1rem;
      }

      .form-control,
      .form-select {
        font-size: 16px;
        /* Prevents zoom on iOS */
      }

      .section-divider {
        margin: 1.5rem 0;
      }
    }

    /* Tablet optimizations */
    @media (min-width: 769px) and (max-width: 1024px) {
      .form-container {
        max-width: 95%;
      }
    }

    /* Animation for dynamic sections */
    .dynamic-section {
      animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Input icon indicators */
    .input-group-text {
      background-color: #f8f9fa;
      border: 2px solid #e0e0e0;
      border-right: none;
      border-radius: 10px 0 0 10px;
    }
  </style>
</head>

<body>

  <div class="form-container">
    <div class="card shadow">
      <div class="card-header">
        <h3>Form Pencatatan Data Kunjungan</h3>
        <small class="text-white-50">Silakan lengkapi data kunjungan Anda</small>
      </div>

      <div class="card-body">
        <form method="POST" action="simpan_kunjungan.php">

          <!-- Data Pribadi -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label required-field">Nama Tamu</label>
              <input type="text" name="guest_name" class="form-control" placeholder="Cth: Dwi Agung" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label required-field">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Cth: agung@email.com" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label required-field">No. Telepon</label>
              <input type="text" name="phone_number" class="form-control" placeholder="Cth: +6281234567890" pattern="^\+?[0-9]{10,20}$" required>
              <small class="text-muted">Gunakan format +62</small>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label required-field">Instansi</label>
              <input type="text" name="company_name" class="form-control" placeholder="Cth: PT Visilog" required>
            </div>
          </div>

          <!-- Keperluan Kunjungan -->
          <div class="mb-3">
            <label class="form-label required-field">Kategori Keperluan</label>
            <select name="visit_regards" id="visit_regards" class="form-select" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="Urusan_surat">Urusan Surat</option>
              <option value="Urusan_keuangan">Urusan Keuangan</option>
              <option value="Urusan_umum">Urusan Umum</option>
              <option value="Urusan_sarana">Urusan Sarana</option>
              <option value="Janji_temu_unit">Janji Temu Unit</option>
              <option value="Janji_temu_staf">Janji Temu Staf</option>
            </select>
          </div>

          <div class="mb-3 dynamic-section" id="unit_section" style="display: none;">
            <label class="form-label required-field">Unit yang Dituju</label>
            <select name="unit_tujuan" id="unit_tujuan" class="form-select">
              <option value="">-- Pilih Unit --</option>
              <?php
              $sql2 = "SELECT * FROM unit ORDER BY id_unit DESC";
              $query2 = mysqli_query($koneksi, $sql2);
              foreach ($query2 as $unit) {
                echo "<option value='{$unit['id_unit']}'>{$unit['unit_name']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3 dynamic-section" id="staf_section" style="display: none;">
            <label class="form-label required-field">Staf yang Dituju</label>
            <select name="staf_tujuan" id="staf_tujuan" class="form-select">
              <option value="">-- Pilih Staf --</option>
              <?php
              $sql1 = "SELECT * FROM staf ORDER BY id_staf DESC";
              $query1 = mysqli_query($koneksi, $sql1);
              foreach ($query1 as $staf) {
                echo "<option value='{$staf['id_staf']}'>{$staf['staf_name']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="row dynamic-section" id="appointment_section" style="display: none;">
            <div class="col-md-6 mb-3">
              <label class="form-label">Sudah Membuat Janji?</label>
              <select name="appointment" id="appointment" class="form-select">
                <option value="No">Belum</option>
                <option value="Yes">Sudah</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi Kunjungan</label>
            <textarea name="visit_desc" class="form-control" rows="3" placeholder="Detail singkat keperluan kunjungan Anda..."></textarea>
          </div>

          <!-- Waktu Kunjungan -->
          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="form-label required-field">Tanggal Kunjungan</label>
              <input type="date" name="visit_date" class="form-control"
                id="visit_date" min="<?php echo date('Y-m-d'); ?>"
                onkeydown="return false" required>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label required-field">Jam Masuk</label>
              <input type="time" name="time_in" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label required-field">Jam Keluar</label>
              <input type="time" name="time_out" class="form-control" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-3">
            Simpan Data Kunjungan
          </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    const visitRegardsSelect = document.getElementById('visit_regards');
    const unitSection = document.getElementById('unit_section');
    const stafSection = document.getElementById('staf_section');
    const appointmentSection = document.getElementById('appointment_section');

    const unitSelect = document.getElementById('unit_tujuan');
    const stafSelect = document.getElementById('staf_tujuan');

    visitRegardsSelect.addEventListener('change', function() {
      const selectedValue = this.value;

      // Hide all sections
      unitSection.style.display = 'none';
      stafSection.style.display = 'none';
      appointmentSection.style.display = 'none';

      // Remove required attributes
      unitSelect.removeAttribute('required');
      stafSelect.removeAttribute('required');

      // Reset values
      unitSelect.value = '';
      stafSelect.value = '';

      // Show relevant sections
      if (selectedValue === 'Janji_temu_unit') {
        unitSection.style.display = 'block';
        appointmentSection.style.display = 'block';
        unitSelect.setAttribute('required', 'required');
      } else if (selectedValue === 'Janji_temu_staf') {
        stafSection.style.display = 'block';
        appointmentSection.style.display = 'block';
        stafSelect.setAttribute('required', 'required');
      }
    });

    // Prevent manual date input
    document.getElementById('visit_date').addEventListener('keydown', function(e) {
      e.preventDefault();
      return false;
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>