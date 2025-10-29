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


  <!-- Contact Form -->
  <div class="container py-5">
    <h2 class="text-center mb-4">Ask a Question</h2>
    <form action="submit_question.php" method="POST" class="mx-auto" style="max-width: 600px;">
      <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="question" class="form-label">Your Question</label>
        <textarea name="question" id="question" rows="4" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Send</button>
    </form>
  </div>

    <!-- FOOTER -->
<footer>
  &copy; 2025 Buku Tamu Digital. All Rights Reserved.
</footer>
</body>
</html>
