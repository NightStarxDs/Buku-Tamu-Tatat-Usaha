<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buku Tatausaha - Form Kunjungan</title>
  <link rel="stylesheet" href="slogin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Header -->
 <header class="py-3 px-5 d-flex justify-content-between align-items-center" style="background-color: #1a4d8eff;">
    <div class="d-flex align-items-center">
      <div class="me-2" style="width:40px; height:40px; background:blue; border-radius:50%;"></div>
      <h5 class="m-0">BUKU TAMU DIGITAL</h5>
    </div>
    <nav>
      <a href="landing.php" class="btn btn-outline-dark mx-1">HOME</a>
      <a href="landing.php" class="btn btn-outline-dark mx-1">FAQ</a>
      <a href="landing.php" class="btn btn-outline-dark mx-1">ABOUT US</a>
      <a href="form.php" class="btn btn-outline-dark mx-1">LOGIN</a>
    </nav>
  </header>

  <!-- Main Form -->
  <main class="container my-5">
    <div class="p-4 rounded" style="background:#f2f2f2;">
      <form action="submit_form.php" method="post">
        <div class="row">
          <div class="col-md-6">
            <label>Nama Instansi</label>
            <input type="text" name="instansi" class="form-control mb-3" required>

            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal" class="form-control mb-3" required>

            <label>Email</label>
            <input type="email" name="email" class="form-control mb-3" required>

            <label>Nama Pengunjung</label>
            <input type="text" name="pengunjung" class="form-control mb-3" required>
          </div>
          <div class="col-md-6">
            <label>Perihal Kunjungan</label>
            <textarea name="perihal" rows="9" class="form-control mb-3" required></textarea>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-info text-white mx-2">SEND</button>
          <button type="reset" class="btn btn-secondary mx-2">RESET</button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-light py-3 mt-5 text-center">
    <p>@ KELOMPOK 1</p>
    <div>SOSIAL MEDIA 
      <span style="color:red;">● ● ●</span>
    </div>
    <p>KELOMPOK 1<br>Nayla | Samuel | Agung</p>
  </footer>
</body>
</html>
