# Proyek Buku-Tamu-Tatat-Usaha

Buku Tamu Tata Usaha dirancang untuk mempermudah pencatatan tamu Tata Usaha melalui media digital berbasis website yang mengutamakan kecepatan kinerja, kemudahan pencarian, pengfilteran data serta akses yang lebih fleksibel.

# Panduan Instalasi

## Persyaratan Sistem

Sebelum melakukan instalasi, pastikan sistem Anda memiliki:

- **XAMPP** (versi terbaru) atau server lokal lainnya dengan PHP 7.0+
- **PHP 7.0+** dengan ekstensi mysqli dan curl
- **MySQL 5.7+** atau MariaDB
- **Composer** (untuk manajemen dependencies)
- **Git** (opsional, untuk kloning repositori)
- Browser modern (Chrome, Firefox, Edge, atau Safari)

## Langkah-Langkah Instalasi

### 1. Download dan Persiapan Project

#### Opsi A: Menggunakan Git

```bash
# Buka terminal/command prompt
# Navigasi ke folder htdocs XAMPP
cd c:\xampp\htdocs

# Clone repository
git clone <repository-url> Buku-Tamu-Tata-Usaha
cd Buku-Tamu-Tata-Usaha
```

#### Opsi B: Download Manual

- Download file project dari repository
- Ekstrak ke folder `c:\xampp\htdocs\Buku-Tamu-Tata-Usaha`

### 2. Instalasi Dependencies PHP

Buka command prompt/terminal dan jalankan:

```bash
# Navigasi ke folder project
cd c:\xampp\htdocs\Buku-Tamu-Tata-Usaha

# Install dependencies menggunakan Composer
composer install
```

Dependencies yang akan diinstall:

- **PHPSpreadsheet**: Untuk export/import data ke Excel
- **TCPDF**: Untuk generate dokumen PDF

### 3. Konfigurasi Database

#### Langkah 3.1: Buat Database Baru

- Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
- Login dengan kredensial default (username: `root`, password: kosong)
- Klik **"New"** untuk membuat database baru
- Masukkan nama database: `guest_book`
- Klik **Create**

#### Langkah 3.2: Import File Database

- Buka folder project, cari file `guest_book.sql`
- Di phpMyAdmin, pilih database `guest_book`
- Klik tab **"Import"**
- Pilih file `guest_book.sql` dari komputer Anda
- Klik **"Go"** untuk import

**Atau melalui command line:**

```bash
mysql -u root -p guest_book < guest_book.sql
```

(Tekan Enter ketika diminta password, karena password default kosong)

### 4. Konfigurasi File Koneksi Database

Edit file `koneksi.php` sesuai dengan konfigurasi database Anda:

```php
<?php
$host = "localhost";      // Host database (default: localhost)
$user = "root";           // Username database (default: root)
$pass = "";               // Password database (kosongi jika tidak ada password)
$db   = "guest_book";     // Nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

**Catatan:** Jika Anda menggunakan password untuk MySQL, ubah bagian `$pass` sesuai password Anda.

### 5. Jalankan XAMPP

- Buka **XAMPP Control Panel**
- Klik tombol **"Start"** pada modul **Apache** dan **MySQL**
- Tunggu hingga status berubah menjadi hijau

### 6. Akses Aplikasi

Buka browser dan akses aplikasi:

#### Landing Page (Publik)

```
http://localhost/Buku-Tamu-Tata-Usaha/landing.php
```

atau

```
http://localhost/Buku-Tamu-Tata-Usaha/
```

#### Form Login (Admin)

```
http://localhost/Buku-Tamu-Tata-Usaha/login.php
```

#### Dashboard Admin (Setelah Login)

```
http://localhost/Buku-Tamu-Tata-Usaha/dashboard.php
```

### 7. Login Admin Pertama Kali

Akses halaman login dan gunakan kredensial default yang telah ada di database. Jika tidak ada user yang tersedia, hubungi administrator untuk membuat user baru melalui database.

## Troubleshooting Umum

### Masalah: Koneksi Database Gagal

**Solusi:**

1. Pastikan MySQL sudah berjalan di XAMPP Control Panel
2. Verifikasi nama database adalah `guest_book`
3. Cek kembali file `koneksi.php` apakah sudah benar
4. Coba akses phpMyAdmin untuk memastikan database ada

### Masalah: 404 Page Not Found

**Solusi:**

1. Pastikan folder project berada di `c:\xampp\htdocs\Buku-Tamu-Tata-Usaha`
2. Pastikan Apache sudah berjalan
3. Coba akses via `http://localhost/Buku-Tamu-Tata-Usaha/landing.php`

### Masalah: Composer Install Error

**Solusi:**

1. Pastikan Composer sudah terinstall: `composer --version`
2. Update Composer: `composer self-update`
3. Hapus folder `vendor` dan `composer.lock`, kemudian jalankan `composer install` kembali

### Masalah: File Upload Tidak Berfungsi

**Solusi:**

1. Pastikan folder `uploads` atau yang sejenis memiliki permission 777
2. Edit `php.ini` dan pastikan `upload_max_filesize` dan `post_max_size` cukup besar
3. Restart Apache di XAMPP Control Panel

## Verifikasi Instalasi Berhasil

Untuk memastikan instalasi berhasil, cek:

1. ✅ Database `guest_book` ada di phpMyAdmin
2. ✅ Folder `vendor` ada di project root
3. ✅ Akses `http://localhost/Buku-Tamu-Tata-Usaha/landing.php` tanpa error
4. ✅ Halaman login dapat diakses tanpa error database
5. ✅ Dapat login dengan kredensial admin

## Langkah-Langkah Selanjutnya

Setelah instalasi berhasil:

1. Buat akun admin tambahan untuk keamanan
2. Ubah password default admin
3. Konfigurasi email (jika diperlukan) untuk notifikasi
4. Set timezone yang sesuai
5. Backup database secara berkala

# Fitur-Fitur

**Landing Page**

Landing page adalah halaman utama serta tampilan utama yang pertama kali diakses oleh pengunjung, pada landing page terdapat beberapa fitur yaitu:

- Navigasi Utama: Menu bar di bagian atas menyediakan akses cepat menuju Beranda, FAQ, Tentang Kami, dan tombol login khusus untuk autentikasi staf.

- Pindai QR Code: Fitur utama berupa QR Code yang memungkinkan tamu memindai melalui perangkat seluler untuk mengisi formulir secara mandiri.

- Akses Formulir Alternatif: Tersedia tombol "Menuju Form" sebagai opsi pengisian data manual apabila tamu tidak dapat melakukan pemindaian QR Code.

- Frequently Asked Questions (FAQ): Menyediakan jawaban otomatis atas pertanyaan umum pengunjung untuk meminimalisir interaksi manual dengan petugas.

- Informasi Sistem (Tentang Kami): Penjelasan profil sistem VISILOG sebagai platform digital modern untuk efisiensi dan keamanan pencatatan data pengunjung di Tata Usaha.

**Form Login**

Halaman ini adalah gerbang keamanan untuk masuk ke Dashboard Admin. Keamanan data menjadi prioritas pada bagian ini dengan rincian teknis sebagai berikut:

- Alur Autentikasi Pengguna:

  - Admin/Staf memasukkan Username dan Password.

  - Sistem melakukan pengecekan ke database untuk mencocokkan kredensial.

  - Jika data Benar, sistem akan mengarahkan pengguna ke Dashboard Admin secara otomatis.

  - Jika data Salah, sistem akan menolak akses.

- Fitur Keamanan & Validasi (Sisi Teknis):

  - Keamanan MD5 Hashing: Sistem tidak menyimpan password dalam bentuk teks biasa. Setiap password yang Anda buat akan dienkripsi menggunakan algoritma MD5, sehingga data tetap aman dari kebocoran data.

  - Validasi Panjang Karakter: Untuk mencegah penggunaan password yang lemah, sistem mengharuskan password memiliki panjang lebih dari 6 karakter.

- Validasi Input JavaScript:

  - Sistem menggunakan JavaScript untuk mengecek form secara real-time.

  - Jika pengguna mengosongkan kolom atau memasukkan password kurang dari 6 karakter, akan muncul pesan error seketika tanpa perlu memuat ulang (reload) halaman.

  - Pesan Error: "Form tidak boleh kosong" atau "Password harus lebih dari 6 karakter".

**Dashboard Admin**

Untuk megakses Dashboard admin staf/admin diminta untuk login melalui form login yang disediakan, kemudian setelah melalui authentikasi login dan dinyatakan benar, staf/admin akan langsung diarahkan ke Dashboard Admin. Pada Dashboard Admin terdapat:

- Dashboard: Pada page Dashboard kita dapat melihat seberapa banyak tamu Perbulan, Perminggu, serta berapa banyak Data Pengunjung dan Data yang masi di masa Pending

- Complete: Pada Complete kita dapat melihat Tabel Data Kunjungan yang sudah selesai, Data Kunjungan berisi, Nama, Nama Instansi, Perihal Kunjungan, Tanggal Kunjungan, Status Dan 2 Aksi yaitu:

  - Tombol Info yang berisi Form Info Lengkap Mengenai Data Tamu Mencakup Email,dan No Telepon
  - Tombol Hapus yang berfungsi untuk menghapus Data

- Upcomng: Pada Upcoming kita dapat melihat Tabel Data Kunjungan yang sedang berjalan maupun mendekati. Data tamu berisi, Nama, Nama Instansi, Perihal Kunjungan, Tanggal Kunjungan, Status Dan 2 Aksi yaitu:

  - Tombol Edit yang berisi Form Edit berfungsi untuk mengubah/mengedit Data
  - Tombol Hapus yang berfungsi untuk menghapus Data

- Pending: Pada Pending kita dapat melihat Tabel Penidng Data Tamu yang berisi, Nama, Nama Instansi, Perihal Kunjungan, Tanggal Kunjungan, Status Dan 2 Aksi yaitu:

  - Tombol Terima untuk menerima Kunjungan dan akan langsung mengirim pesan diterima pada email tamu tsb
  - Tombol Tolak untuk menolak Kunjungan dan akan langsung mengirim pesan ditolak pada email tamu tsb
