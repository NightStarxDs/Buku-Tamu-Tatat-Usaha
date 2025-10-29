<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buku Tamu Digital</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 

  <style>
    body {
      font-family: Arial, sans-serif;
    }
    header {
      background-color: #ffffff;
      border-bottom: 2px solid #008080;
      
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
    
    .faq-section, .about-section, footer {
      padding: 60px 0;
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

  </style>
</head>
<body>

<!-- HEADER -->
<header class="d-flex justify-content-between align-items-center px-4 py-3 position-relative">
  <div class="d-flex align-items-center">
    <img src="visilog.png" alt="" width="100" class="me-2 position-absolute top-1 start-0">
  </div>
  <nav>
    <a href="#home" class="btn btn-outline-white mx-1">Home</a>
    <a href="#faq" class="btn btn-outline-white mx-1">FAQ</a>
    <a href="#about" class="btn btn-outline-white mx-1">About Us</a>
    <a href="form.php" class="btn btn-outline-warning mx-1">Login</a>
  </nav>
</header>

<!-- HERO SECTION -->
<section class="hero position-relative text-center text-white">
  <img src="bg.png" class="img-fluid w-100" alt="Hero Image" style="height: 100vh; object-fit: cover;">

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
    <a href="contact.php" class="btn btn-outline-primary">Ask Our Customer Service</a>
  </div>
</section>

<!-- About Us-->
<section id="about" class="about-section container-fluid text-center py-5" style="background-color: #a8c3e6;">
  <div class="container">
    <h2 class="text-center mb-3">About Us</h2>

    <div class="row align-items-center ">
      <!-- Image -->
      <img src="LOGO_lagi.png" alt="Visilog Logo" class="img-fluid"
     style="max-width: 30%; height: auto; margin-left: 10px;">

      <!-- Text -->
      <div class="col-md-6 text-center text-md-start mt-4 mt-md-0 ms-n3">
        <p style="font-size: 1.1rem;">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, aliquid ipsam nisi quod eum nulla ab optio, odit sequi blanditiis deserunt repellat consequatur? Ab libero alias obcaecati illo dolor cumque.
        </p>
      </div>
    </div>
  </div>
</section>


<!-- FOOTER -->
<footer>
  &copy; 2025 Buku Tamu Digital. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
