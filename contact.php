<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Buku Tamu</a>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="landing.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="landing.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="landing.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="form.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

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
</body>
</html>
