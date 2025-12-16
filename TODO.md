# Rencana Perbaikan Database - Guest Book System

## Masalah yang Teridentifikasi:
1. **Field nama vs nama_tamu**: Database menggunakan `nama`, kode PHP menggunakan `nama_tamu`
2. **Status 'Rejected'**: Database tidak memiliki status ini, hanya 'Pending','Upcoming','Now','Done','Close'
3. **Field ID staf/unit**: Kode mereferensikan field yang tidak ada di database
4. **submit_form.php kosong**: Tidak ada query INSERT yang sebenarnya
5. **Field time_out**: Digunakan di kode tapi tidak ada di database

## Langkah Perbaikan:

### 1. Update Struktur Database
- [ ] Tambahkan field `nama_tamu` di tabel `visit_data` atau ubah semua kode untuk menggunakan `nama`
- [ ] Hapus referensi ke field `id_staf` dan `id_unit` yang tidak ada
- [ ] Tambahkan field `time_out` jika diperlukan, atau hapus penggunaannya

### 2. Perbaiki File submit_form.php
- [ ] Tambahkan query INSERT yang proper untuk menyimpan data form
- [ ] Sesuaikan field names dengan database

### 3. Perbaiki File proses_tolak.php
- [ ] Ubah status dari 'Rejected' menjadi 'Close' 
- [ ] Perbaiki referensi field nama_tamu menjadi nama

### 4. Perbaiki File proses_terima.php
- [ ] Perbaiki referensi field nama_tamu menjadi nama

### 5. Perbaiki File kunjungan_pending.php
- [ ] Perbaiki referensi field nama_tamu menjadi nama
- [ ] Hapus referensi ke id_staf dan id_unit

### 6. Perbaiki File kunjungan_berjalan.php
- [ ] Perbaiki referensi field nama_tamu menjadi nama

### 7. Testing
- [ ] Test form submission
- [ ] Test proses terima/tolak
- [ ] Test tampilan data di dashboard

## File yang Perlu Diedit:
1. `submit_form.php` - Perbaiki INSERT query
2. `proses_terima.php` - Perbaiki nama field
3. `proses_tolak.php` - Ubah status dan nama field
4. `kunjungan_pending.php` - Perbaiki nama field dan hapus referensi yang salah
5. `kunjungan_berjalan.php` - Perbaiki nama field
6. Database schema (opsional - tergantung pilihan implementasi)
