<?php include 'koneksi.php' ?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Form Kunjungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

  <div class="card shadow-sm p-4">
    <h3 class="mb-4">Form Pencatatan Data Kunjungan</h3>

    <form method="POST" action="simpan_kunjungan.php">

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Nama Tamu</label>
          <input type="text" name="guest_name" class="form-control" placeholder="Cth: Dwi Agung " required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Cth: agung@email.com" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">No. Telepon</label>
          <input type="number" name="phone_number" class="form-control" placeholder="Cth: +6281234567890 (Gunakan +62)" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Instansi</label>
          <input type="text" name="company_name" class="form-control" placeholder="Cth: PT Visilog" required>
        </div>
      </div>

      <hr>

      <div class="mb-3">
        <label class="form-label">Kategori Keperluan</label>
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

      <div class="mb-3" id="unit_section" style="display: none;">
        <label class="form-label">Unit yang Dituju</label>
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

      <div class="mb-3" id="staf_section" style="display: none;">
        <label class="form-label">Staf yang Dituju</label>
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

      <div class="mb-3">
        <label class="form-label">Deskripsi Kunjungan</label>
        <textarea name="visit_desc" class="form-control" rows="3" placeholder="Detail Singkat keperluan..."></textarea>
      </div>

      <div class="row" id="appointment_section" style="display: none;">
        <div class="col-md-6 mb-3">
          <label class="form-label">Sudah Membuat Janji?</label>
          <select name="appointment" id="appointment" class="form-select">
            <option value="No">Tidak</option>
            <option value="Yes">Ya</option>
          </select>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Tanggal Kunjungan</label>
          <input type="date" name="visit_date" class="form-control"
            id="visit_date" min="<?php echo date('Y-m-d'); ?>"
            onkeydown="return false" required>
        </div>
        <div class=" col-md-4 mb-3">
          <label class="form-label">Jam Masuk</label>
          <input type="time" name="time_in" class="form-control" required>
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label">Jam Keluar</label>
          <input type="time" name="time_out" class="form-control" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Data Kunjungan</button>
    </form>
  </div>

  <script>
    const visitRegardsSelect = document.getElementById('visit_regards');
    const unitSection = document.getElementById('unit_section');
    const stafSection = document.getElementById('staf_section');
    const appointmentSection = document.getElementById('appointment_section'); // Variabel baru

    const unitSelect = document.getElementById('unit_tujuan');
    const stafSelect = document.getElementById('staf_tujuan');

    visitRegardsSelect.addEventListener('change', function() {
      const selectedValue = this.value;

      // 1. Reset dan sembunyikan semua section
      unitSection.style.display = 'none';
      stafSection.style.display = 'none';
      appointmentSection.style.display = 'none';

      unitSelect.removeAttribute('required');
      stafSelect.removeAttribute('required');

      unitSelect.value = '';
      stafSelect.value = '';

      // 2. Tampilkan section Unit
      if (selectedValue === 'Janji_temu_unit') {
        unitSection.style.display = 'block';
        appointmentSection.style.display = 'block';
        unitSelect.setAttribute('required', 'required');
      }
      // 3. Tampilkan section Staf
      else if (selectedValue === 'Janji_temu_staf') {
        stafSection.style.display = 'block';
        appointmentSection.style.display = 'block';
        stafSelect.setAttribute('required', 'required');
      }
    });
  </script>

</body>

</html>