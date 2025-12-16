<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Kunjungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Form Pencatatan Data Kunjungan</h3>

<form method="POST" action="simpan_kunjungan.php">

  <div class="mb-3">
    <label>Nama Tamu</label>
    <input type="text" name="guest_name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>No. Telepon</label>
    <input type="text" name="phone_number" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Instansi</label>
    <input type="text" name="company_name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Keperluan</label>
    <textarea name="visit_desc" class="form-control"></textarea>
  </div>

  <div class="mb-3">
    <label>Tanggal Kunjungan</label>
    <input type="date" name="visit_date" class="form-control" required>
  </div>

  <div class="row">
    <div class="col mb-3">
      <label>Jam Masuk</label>
      <input type="time" name="time_in" class="form-control" required>
    </div>
    <div class="col mb-3">
      <label>Jam Keluar</label>
      <input type="time" name="time_out" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Janji Temu</label>
    <select name="appointment" class="form-control" required>
      <option value="Ya">Ya</option>
      <option value="Tidak">Tidak</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
      <option value="Pending">Pending</option>
      <option value="Upcoming">Upcoming</option>
      <option value="Done">Done</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</body>
</html>
