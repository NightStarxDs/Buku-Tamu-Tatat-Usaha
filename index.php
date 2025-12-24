<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buku Tamu Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Inter", sans-serif;
      font-optical-sizing: auto;
      font-weight: normal;
      font-style: normal;
      overflow-x: hidden;
    }

    header {
      background-color: #ffffff;
      font-size: 1rem;
      padding: 0.75rem 1.5rem;
    }

    header img {
      width: 120px;
      position: relative;
    }

    header nav {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    header nav a {
      font-size: 0.9rem;
      padding: 0.5rem 1rem;
      white-space: nowrap;
    }

    .logo-text {
      font-weight: bold;
      font-size: 1.2rem;
    }

    .hamburger-btn {
      display: none;
      background: none;
      border: none;
      font-size: 1.8rem;
      color: #008080;
      cursor: pointer;
      padding: 0.5rem;
      z-index: 1001;
    }

    .sidebar {
      position: fixed;
      top: 0;
      right: -100%;
      width: 280px;
      height: 100vh;
      background-color: #ffffff;
      box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
      transition: right 0.3s ease-in-out;
      z-index: 1050;
      padding: 2rem 1.5rem;
    }

    .sidebar.active {
      right: 0;
    }

    .sidebar-close {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: none;
      border: none;
      font-size: 2rem;
      color: #333;
      cursor: pointer;
      padding: 0;
      line-height: 1;
    }

    .sidebar-nav {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-top: 3rem;
    }

    .sidebar-nav a {
      padding: 1rem;
      text-decoration: none;
      color: #333;
      border-radius: 8px;
      transition: all 0.3s;
      font-weight: 500;
    }

    .sidebar-nav a:hover {
      background-color: #f0f0f0;
      color: #008080;
      transform: translateX(5px);
    }

    .sidebar-nav a.btn-outline-info {
      border: 2px solid #008080;
      color: #008080;
      text-align: center;
    }

    .sidebar-nav a.btn-outline-info:hover {
      background-color: #008080;
      color: white;
    }

    .sidebar-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease-in-out;
      z-index: 1040;
    }

    .sidebar-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero img {
      height: 100vh;
      object-fit: cover;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      padding: 2rem 1rem;
    }

    .hero-content h1 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .hero-content p {
      font-size: 1rem;
      margin-bottom: 1.5rem;
    }

    .qr-container {
      background-color: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      max-width: 280px;
      margin: 0 auto;
    }

    .qr-placeholder {
      width: 100%;
      max-width: 220px;
      height: 220px;
      background-color: #f8f9fa;
      border: 3px dashed #6c757d;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      margin: 0 auto;
    }

    .qr-placeholder img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .faq-section,
    .about-section {
      padding: 40px 15px;
    }

    .about-section img {
      max-width: 100%;
      height: auto;
    }

    footer {
      background-color: #008080;
      color: #ffffff;
      text-align: center;
      border-top: 1px solid #008080;
      padding: 20px;
    }

    html {
      scroll-behavior: smooth;
    }

    .btn-outline-info {
      color: teal;
      border-color: teal;
    }

    .btn-outline-info:hover {
      background-color: teal;
      color: white;
      border-color: teal;
    }

    @media (max-width: 991px) {
      .hamburger-btn {
        display: block;
      }

      header nav {
        display: none;
      }

      header {
        padding: 0.25rem 0.50rem;
      }

      header img {
        width: 120px;
      }
    }

    @media (max-width: 575px) {
      header img {
        width: 80px;
      }

      .hero-content h1 {
        font-size: 1.5rem;
      }

      .hero-content p {
        font-size: 0.9rem;
      }

      .qr-container {
        padding: 15px;
        max-width: 250px;
      }

      .qr-placeholder {
        max-width: 180px;
        height: 180px;
      }

      .btn-lg {
        font-size: 1rem;
        padding: 0.6rem 1.2rem;
      }

      .faq-section h2,
      .about-section h2 {
        font-size: 1.5rem;
      }

      .about-section p {
        font-size: 0.9rem !important;
      }

      .about-section .col-md-4 {
        margin-bottom: 1rem;
      }

      .sidebar {
        width: 250px;
      }
    }

    /* Tablets (576px - 767px) */
    @media (min-width: 576px) and (max-width: 767px) {
      header img {
        width: 100px;
      }

      .hero-content h1 {
        font-size: 1.8rem;
      }

      .qr-container {
        max-width: 260px;
      }

      .qr-placeholder {
        max-width: 200px;
        height: 200px;
      }
    }

    @media (min-width: 768px) and (max-width: 991px) {
      header img {
        width: 110px;
      }

      .hero-content h1 {
        font-size: 2.2rem;
      }

      .qr-container {
        max-width: 280px;
      }

      .qr-placeholder {
        max-width: 220px;
        height: 220px;
      }
    }

    /* Desktop (992px+) - SHOW NORMAL NAV */
    @media (min-width: 992px) {
      .hamburger-btn {
        display: none;
      }

      header nav {
        display: flex;
      }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
      header img {
        width: 120px;
      }

      .hero-content h1 {
        font-size: 2.5rem;
      }

      .qr-container {
        max-width: 300px;
      }

      .qr-placeholder {
        max-width: 240px;
        height: 240px;
      }
    }

    @media (min-width: 1200px) {
      header img {
        width: 120px;
      }

      .hero-content h1 {
        font-size: 3rem;
      }

      .qr-container {
        max-width: 320px;
        padding: 30px;
      }

      .qr-placeholder {
        max-width: 250px;
        height: 250px;
      }
    }

    @media (max-height: 500px) and (orientation: landscape) {
      .hero img {
        height: 100%;
        min-height: 500px;
      }

      .hero-content {
        padding: 1rem;
      }

      .hero-content h1 {
        font-size: 1.3rem;
      }

      .qr-container {
        padding: 10px;
      }

      .qr-placeholder {
        max-width: 150px;
        height: 150px;
      }
    }
  </style>
</head>

<body>

  <!-- OVERLAY FOR SIDEBAR -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- SIDEBAR -->
  <div class="sidebar" id="sidebar">
    <button class="sidebar-close" id="sidebarClose">
      <i class="bi bi-x"></i>
    </button>
    <nav class="sidebar-nav">
      <a href="index.php#home">
        <i class="bi bi-house-door me-2"></i> Beranda
      </a>
      <a href="index.php#faq">
        <i class="bi bi-question-circle me-2"></i> FAQ
      </a>
      <a href="index.php#about">
        <i class="bi bi-info-circle me-2"></i> Tentang Kami
      </a>
      <a href="login.php" class="btn-outline-info">
        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
      </a>
    </nav>
  </div>

  <!-- HEADER -->
  <header class="d-flex justify-content-between align-items-center position-sticky top-0 shadow-sm" style="background-color: #ffffff; z-index: 1000;">
    <div class="d-flex align-items-center">
      <img src="visilog2.png" alt="Visilog Logo">
    </div>

    <!-- HAMBURGER BUTTON (Mobile Only) -->
    <button class="hamburger-btn" id="hamburgerBtn">
      <i class="bi bi-list"></i>
    </button>

    <!-- NORMAL NAV (Desktop Only) -->
    <nav>
      <a href="index.php#home" class="btn btn-outline-white">Beranda</a>
      <a href="index.php#faq" class="btn btn-outline-white">FAQ</a>
      <a href="index.php#about" class="btn btn-outline-white">Tentang</a>
      <a href="login.php" class="btn btn-outline-info">Masuk</a>
    </nav>
  </header>

  <!-- HERO SECTION -->
  <section id="home" class="hero position-relative text-center text-white">
    <img src="bg.png" class="img-fluid w-100" alt="Hero Image">

    <!-- Overlay -->
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <!-- Content -->
    <div class="hero-content position-absolute top-50 start-50 translate-middle w-100">
      <div class="container">
        <div class="row align-items-center justify-content-center g-4">

          <!-- QR Code Section -->
          <div class="col-12 col-md-5 order-1 order-md-1">
            <div class="qr-container">
              <div class="qr-placeholder">
                <img src="QR_CODE.png" alt="QR Code" class="img-fluid">
              </div>
              <p class="mt-3 mb-0 text-dark fw-semibold">Scan untuk mengisi form</p>
            </div>
          </div>

          <!-- Text Content -->
          <div class="col-12 col-md-7 text-center text-md-start order-2 order-md-2">
            <h1 class="display-4 fw-bold">Selamat Datang di Buku Tamu Digital</h1>
            <p class="lead">Catat kunjungan dengan cepat, mudah, dan efisien. Scan atau Tekan tombol dibawah ini</p>
            <a href="tamu.php" class="btn btn-primary btn-lg mt-3">Menuju Form</a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- FAQ SECTION -->
  <section id="faq" class="faq-section container">
    <h2 class="text-center mb-4 mb-md-5">Frequently Asked Questions</h2>

    <div class="accordion" id="faqAccordion">

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Apa yang perlu diisi?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Anda perlu mengisi data sesuai formulir yang tersedia di halaman utama.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Kapan boleh berkunjung?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Kunjungan dapat dilakukan pada jam operasional yang telah ditentukan.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Kemana isi form?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Form yang sudah diisi akan otomatis dikirim ke sistem kami untuk diproses.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Jika QR tidak bisa?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Silakan hubungi admin atau gunakan form manual sebagai alternatif.
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-4">
      <a href="mailto:VisiogTeam@gmail.com" class="btn btn-outline-primary">Tanyakan pada Layanan Pelanggan kami</a>
    </div>
  </section>

  <!-- Tentang Kami-->
  <section id="about" class="about-section container-fluid text-center py-5" style="background-color: #a8c3e6;">
    <div class="container">
      <h2 class="text-center mb-3 mb-md-4">Tentang Kami</h2>

      <div class="row d-flex align-items-center justify-content-center g-4">
        <div class="col-12 col-md-4">
          <img src="LOGO_lagi.png" alt="Visilog Logo" class="img-fluid" style="max-width: 80%;">
        </div>

        <div class="col-12 col-md-8">
          <p class="" style="font-size: 1.1rem; text-align:justify;">
            Visilog (Visit Log) adalah sistem buku tamu digital modern yang dikembangkan khusus untuk Tata Usaha,
            dirancang untuk mengoptimalkan pencatatan dan pengelolaan data pengunjung secara efisien. Sistem ini
            menggantikan pencatatan manual tradisional dengan solusi digital yang lebih terstruktur dan mudah diakses.
            Dengan fitur-fitur seperti pencatatan otomatis waktu kunjungan, kategorisasi tujuan, dan penyimpanan data
            yang aman, Visilog membantu staf Tata Usaha dalam mengorganisir dan memantau arus pengunjung dengan lebih
            baik. Komitmen kami adalah menyederhanakan proses administrasi sambil meningkatkan keamanan dan akurasi
            pencatatan data kunjungan.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    &copy; 2025 Visilog. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Fungsi Sidebar
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const sidebar = document.getElementById('sidebar');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarLinks = document.querySelectorAll('.sidebar-nav a');

    // Buka Sidebar
    hamburgerBtn.addEventListener('click', () => {
      sidebar.classList.add('active');
      sidebarOverlay.classList.add('active');
      document.body.style.overflow = 'hidden'; // Prevent scroll when sidebar open
    });

    // Tutup Sidebar
    function closeSidebar() {
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      document.body.style.overflow = ''; // Restore scroll
    }

    sidebarClose.addEventListener('click', closeSidebar);
    sidebarOverlay.addEventListener('click', closeSidebar);

    // Tutup sidebar Ketika Menekan link
    sidebarLinks.forEach(link => {
      link.addEventListener('click', () => {
        // Delay closing to allow smooth navigation
        setTimeout(closeSidebar, 300);
      });
    });

    // Tutup sidebar Ketika Menekan ESC key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && sidebar.classList.contains('active')) {
        closeSidebar();
      }
    });
  </script>

</body>

</html>