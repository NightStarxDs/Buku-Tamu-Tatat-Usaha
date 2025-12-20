# Proyek Buku-Tamu-Tatat-Usaha

Buku Tamu Tata Usaha dirancang untuk mempermudah pencatatan tamu Tata Usaha melalui media digital berbasis website yang mengutamakan kecepatan kinerja, kemudahan pencarian, pengfilteran data serta akses yang lebih fleksibel.

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
