<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    body {
      background: #f2f2f2;
      height: 100vh;
      font-family: "Inter", sans-serif;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      width: 100%;
      height: auto;
      margin-top: 30px;
    }

    @keyframes shakeSlow {
      0% {
        transform: translateX(0);
        opacity: 0;
      }

      10% {
        transform: translateX(-10px);
        opacity: 0.6;
      }

      20% {
        transform: translateX(10px);
        opacity: 0.8;
      }

      30% {
        transform: translateX(-8px);
        opacity: 0.9;
      }

      40% {
        transform: translateX(8px);
        opacity: 1;
      }

      50% {
        transform: translateX(-6px);
      }

      60% {
        transform: translateX(6px);
      }

      70% {
        transform: translateX(-4px);
      }

      80% {
        transform: translateX(4px);
      }

      90% {
        transform: translateX(-2px);
      }

      100% {
        transform: translateX(0);
      }
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      background-color: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      text-align: center;
      animation: shakeSlow 1.8s ease-out forwards;
    }

    .login-card img {
      width: 100px;
      height: 100px;
      margin-bottom: 1rem;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    h3 {
      font-weight: 600;
      color: #2f3542;
    }

    .btn-primary {
      background-color: #15abe7;
      border: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0e9eff;
      transform: translateY(-2px);
    }

    .btn-secondary {
      background-color: #adb5bd;
      border: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background-color: #868e96;
      transform: translateY(-2px);
    }

    .button-group {
      display: flex;
      justify-content: center;
      gap: 3rem;
    }

    input.form-control:focus {
      box-shadow: 0 0 8px rgba(67, 233, 123, 0.5);
      border-color: #2d97fb;
    }

    .form-check-label {
      font-size: 0.9rem;
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

    .btn-outline-info {
      color: teal;
      border-color: teal;
    }

    .btn-outline-info:hover {
      background-color: teal;
      color: white;
      border-color: teal;
    }

    /* Media Queries for Header */
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

      .sidebar {
        width: 250px;
      }
    }

    @media (min-width: 576px) and (max-width: 767px) {
      header img {
        width: 100px;
      }
    }

    @media (min-width: 768px) and (max-width: 991px) {
      header img {
        width: 110px;
      }
    }

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
    }

    @media (min-width: 1200px) {
      header img {
        width: 120px;
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
      <img src="Visilog2.png" alt="Visilog Logo">
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


  <div class="container">
    <div class="login-card">
      <img
        src="LOGO_lagi.png"
        alt="Visilog" />
      <h3 class="mb-4">Masuk</h3>

      <form id="loginForm" novalidate action="proses_login.php" method="post">
        <div class=" mb-3 text-start">
          <label for="username" class="form-label">Nama Pengguna</label>
          <input
            type="text"
            id="username"
            name="username"
            class="form-control"
            placeholder="Masukkan Nama Pengguna"
            required />
          <div class="invalid-feedback">
            Nama Pengguna harus di isi
          </div>
        </div>


        <div class="mb-3 text-start">
          <label for="password" class="form-label">Kata Sandi</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder="Masukkan password"
            required />
          <div class="invalid-feedback">
            Kata Sandi harus minimal 6 karakter.
          </div>
        </div>

        <!-- 🔘 Tombol -->
        <div class="button-group mt-3">
          <a type="button" class="btn btn-secondary px-3" id="backBtn" href="index.php">Back</a>
          <button type="submit" class="btn btn-primary px-4">Masuk</button>
        </div>
      </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Validasi -->
    <script>
      document.getElementById("loginForm").addEventListener("submit", function(event) {
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        let valid = true;

        if (username.value.trim() === "") {
          username.classList.add("is-invalid");
          valid = false;
        } else {
          username.classList.remove("is-invalid");
          username.classList.add("is-valid");
        }

        if (password.value.length < 6) {
          password.classList.add("is-invalid");
          valid = false;
        } else {
          password.classList.remove("is-invalid");
          password.classList.add("is-valid");
        }

        if (!valid) {
          event.preventDefault();
        }
      });
    </script>
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