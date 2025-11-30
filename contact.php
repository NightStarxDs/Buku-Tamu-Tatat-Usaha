<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    header {
      background-color: #ffffff;
      font-size: 1rem;

    }


    footer {
      background-color: #008080;
      color: #ffffff;
      text-align: center;
      border-top: 1px solid #008080;
      padding: 20px;
    }

    .btn-outline-warning {
      color: teal;
      border-color: teal;
    }

    .btn-outline-warning:hover {
      background-color: teal;
      color: white;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header class="d-flex justify-content-between align-items-center px-4 py-2 position-sticky top-0 shadow-sm" style="background-color: #ffffff; z-index: 1000;">
    <div class="d-flex align-items-center">
      <img src="visilog.png" alt="" width="120" class="me-2 position-absolute">
    </div>
    <nav>
      <a href="landing.php#home" class="btn btn-outline-white mx-1">Beranda</a>
      <a href="landing.php#faq" class="btn btn-outline-white mx-1">FAQ</a>
      <a href="landing.php#about" class="btn btn-outline-white mx-1">Tentang Kami</a>
      <a href="form.php" class="btn btn-outline-warning mx-1">Login</a>
    </nav>
  </header>


  <!-- Contact Form -->
  <div class="card shadow-sm my-5 mx-auto" style="max-width: 700px;">
    <div class="container py-5">
      <h2 class="text-center mb-4">Berikan Pertanyaan Anda</h2>
      <form action="submit_question.php" method="POST" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="question" class="form-label">Pertanyaan</label>
          <textarea name="question" id="question" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Kirim</button>
      </form>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    &copy; 2025 Buku Tamu Digital. All Rights Reserved.
  </footer>
</body>

</html>