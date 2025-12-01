<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />

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
    }

    .btn-outline-warning {
      color: teal;
      border-color: teal;
    }

    .btn-outline-warning:hover {
      background-color: teal;
      color: black;
    }
  </style>
</head>

<body>
  <header class="d-flex justify-content-between align-items-center px-4 py-2 position-sticky top-0 shadow-sm" style="background-color: #ffffff; z-index: 1000;">
    <div class="d-flex align-items-center">
      <img src="visilog.png" alt="" width="120" class="me-2 position-absolute">
    </div>
    <nav>
      <a href="landing.php#home" class="btn btn-outline-white mx-1">Beranda</a>
      <a href="landing.php#faq" class="btn btn-outline-white mx-1">FAQ</a>
      <a href="landing.php#about" class="btn btn-outline-white mx-1">Tentang Kami</a>
      <a href="form.php" class="btn btn-outline-warning mx-1">Masuk</a>
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
            name="usename"
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
          <button type="button" class="btn btn-secondary px-3" id="backBtn">
            Back
          </button>
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

        if (valid) {
          even.preventDefault();
        }
      });

      document.getElementById("backBtn").addEventListener("click", function() {
        window.history.back();
      });
    </script>
</body>

</html>