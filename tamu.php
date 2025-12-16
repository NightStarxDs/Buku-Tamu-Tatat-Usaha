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
        <input type="text" name="guest_name" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">No. Telepon</label>
        <input type="text" name="phone_number" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Instansi</label>
        <input type="text" name="company_name" class="form-control" required>
      </div>
    </div>

    <hr>

    <div class="mb-3">
      <label class="form-label">Kategori Keperluan</label>
      <select name="visit_regards" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Urusan_surat">Urusan Surat</option>
        <option value="Urusan_keuangan">Urusan Keuangan</option>
        <option value="Urusan_umum">Urusan Umum</option>
        <option value="Urusan_sarana">Urusan Sarana</option>
        <option value="Janji_temu_unit">Janji Temu Unit</option>
        <option value="Janji_temu_staf">Janji Temu Staf</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi Tambahan (Opsional)</label>
      <textarea name="visit_desc" class="form-control" rows="3" placeholder="Detail keperluan..."></textarea>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal Kunjungan</label>
        <input type="date" name="visit_date" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Jam Masuk</label>
        <input type="time" name="time_in" class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Jam Keluar</label>
        <input type="time" name="time_out" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Sudah Ada Janji?</label>
        <select name="appointment" class="form-select" required>
          <option value="Tidak">Tidak</option>
          <option value="Ya">Ya</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="Pending">Pending</option>
          <option value="Upcoming">Upcoming</option>
          <option value="Done">Done</option>
        </select>
      </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Data Kunjungan</button>
  </form>
</div>

</body>
</html>