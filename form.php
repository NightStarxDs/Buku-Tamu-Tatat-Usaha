<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <!-- Form login untuk admin yang berisi nama,email dan password-->
    <div class="form-container">
           <h2>Login Admin</h2>
    <form id="registrationForm">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama">
            <div class="error-massage" id="nameError"> Nama tidak boleh kosong</div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan alamat email yang valid">
            <div class="error-massage" id="emailError">Email  tidak boleh kosong</div>
        </div>
        <div class="form-group">
                <label for="password">Kata Sandi:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi">
                <div class="error-massage" id="passwordError">Kata sandi harus minimal 6 karakter</div>
            </label>
        </div>
        <!-- button untuk login dan back -->
        <button type="submit" class="submit-btn">Daftar</button>
        <button type="back" class="back-btn" href="#">Back</button>
     </form>
    </div>
 <input type="checkbox" id="html" name="html" value="yes">
<label for="html">Saya Mengerti</label>
</body>
</html>