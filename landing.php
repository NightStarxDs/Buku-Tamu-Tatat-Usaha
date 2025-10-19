<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buku Tamu Digital</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 <link rel="stylesheet" href="slogin.css">

  <style>
    body {
      font-family: Arial, sans-serif;
    }
    header {
      background-color: #3e7bcb;
      border-bottom: 2px solid #f9f9f9;

    }
    .logo-text {
      font-weight: bold;
      font-size: 1.2rem;
    }
    .hero-section {
      height: 70vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      background-color: #e9ecef;
    }
    .about-section{
      background-color: #aac2e0;
    }
    .faq-section, .about-section, footer {
      padding: 60px 0;
    }
    footer {
      background-color: #1a4d8eff;
      text-align: center;
      border-top: 1px solid #ddd;
      padding: 20px;
    }
  </style>
</head>
<body>

<!-- HEADER -->
<header class="d-flex justify-content-between align-items-center px-4 py-3">
  <div class="d-flex align-items-center">
    <img src="poltek.png" alt="poltek.png" width="40" class="me-2">
    <span class="">BukuTamu Digital</span>
  </div>
  <nav>
    <a href="#home" class="btn btn-outline-danger mx-1">Home</a>
    <a href="#faq" class="btn btn-outline-danger mx-1">FAQ</a>
    <a href="#about" class="btn btn-outline-danger mx-1">About Us</a>
    <a href="form.php" class="btn btn-outline-warning mx-1">Login</a>
  </nav>
</header>

<!-- HERO SECTION -->
<section class="hero position-relative text-center text-white">
  <img src="poli.jpg" class="img-fluid w-100" alt="Hero Image" style="height: 100vh; object-fit: cover;">

  <!-- Overlay -->
  <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>

  <!-- Text content -->
  <div class="hero-content position-absolute top-50 start-50 translate-middle">
    <h1 class="display-4 fw-bold">Selamat Datang di Buku Tamu Digital</h1>
    <p>Catat kunjungan dengan cepat, mudah, dan efisien</p>
    <a href="tamu.php" class="btn btn-primary mt-3">Go to Form</a>
  </div>
</section>



<!-- FAQ SECTION -->
<section id="faq" class="faq-section container">
  <h2 class="text-center mb-5">Frequently Asked Questions</h2>
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="p-3 border rounded">Apa yang perlu diisi?</div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="p-3 border rounded">Kapan boleh berkunjung?</div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="p-3 border rounded">Kemana isi form?</div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="p-3 border rounded">Jika QR tidak bisa?</div>
    </div>
  </div>
  <div class="text-center mt-4">
    <a href="contact.php" class="btn btn-outline-primary">Ask Our Customer Service</a>
  </div>
</section>

<!-- ABOUT US SECTION -->
<section id="about" class="about-section container-fluid" style="background-color: #a8c3e6;">
  <h2 class="text-center mb-5">About Us</h2>

  <div class="row align-items-center mb-5">
    <div class="col-md-6">
      <p>Kami menyediakan sistem buku tamu digital untuk mempermudah pencatatan data pengunjung dan pelaporan.</p>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  &copy; 2025 Buku Tamu Digital. All Rights Reserved.
</footer>

</body>
</html>
