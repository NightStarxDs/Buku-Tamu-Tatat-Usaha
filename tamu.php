<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buku Tatausaha - Form Kunjungan</title>
  <link rel="stylesheet" href="slogin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
    }
    header {
      background-color: #ffffff;
      border-bottom: 2px solid #008080;

    }

    footer {
      background-color: #008080;
      color: #ffffff;
      text-align: center;
      border-top: 1px solid #008080;
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- HEADER -->
<header class="d-flex justify-content-between align-items-center px-4 py-3 position-relative">
  <div class="d-flex align-items-center">
    <img src="visilog.png" alt="" width="100" class="me-2 position-absolute top-1 start-0">
  </div>
  <nav>
    <a href="landing.php#home" class="btn btn-outline-white mx-1">Home</a>
    <a href="landing.php#faq" class="btn btn-outline-white mx-1">FAQ</a>
    <a href="landing.php#about" class="btn btn-outline-white mx-1">About Us</a>
    <a href="form.php" class="btn btn-outline-warning mx-1">Login</a>
  </nav>
</header>

  <main class="container my-5">
  <div class="p-4 rounded" style="background:#f2f2f2;">
    <form action="submit_form.php" method="post">
      <div class="row">
        <!-- LEFT COLUMN -->
        <div class="col-md-6">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control mb-3" required>

          <label>Nama Instansi</label>
          <input type="text" name="instansi" class="form-control mb-3" required>

          <label>Tanggal Kunjungan</label>
          <input type="date" name="tanggal" class="form-control mb-3" required>

          <label>Email</label>
          <input type="email" name="email" class="form-control mb-3" required>

          <label>Nomor Telepon</label>
          <input type="tel" name="telepon" class="form-control mb-3" placeholder="ex: 081234567890" required>

          <div class="row">
            <div class="col-md-6">
              <label>Waktu Datang</label>
              <input type="time" name="waktu_datang" class="form-control mb-3" required>
            </div>
            <div class="col-md-6">
              <label>Waktu Pulang</label>
              <input type="time" name="waktu_pulang" class="form-control mb-3" required>
            </div>
          </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-6">
          <label>Perihal Kunjungan</label>
          <textarea name="perihal" rows="17" class="form-control mb-3" required></textarea>
        </div>
      </div>

      <!-- BUTTONS -->
      <div class="text-center">
        <button type="submit" class="btn btn-info text-white mx-2">SEND</button>
        <button type="reset" class="btn btn-secondary mx-2">RESET</button>
      </div>
    </form>
  </div>
</main>



  <!-- FOOTER -->
<footer>
  &copy; 2025 Visilog. All Rights Reserved.
</footer>
</body>
</html>
