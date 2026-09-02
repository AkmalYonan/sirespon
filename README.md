<p align="center">
  <img src="https://raw.githubusercontent.com/bakaroti/resource/refs/heads/main/logo_110.png" />
</p>

# 🚀 SiRespon - Digital Reporting Issue

Layanan laporan cepat diperuntukan untuk sebuah Instansi tertentu yang memiliki website / pengelola ini, dengan berbagai fitur seperti anonim,tracking,image

## ✨ Fitur Utama

- **Sistem Autentikasi**: Login Untuk Instansi
- **Admin Panel**: Dashboard intuitif untuk mengelola seluruh Pengaduan / Report.
- **Sistem CRUD**: Form input dari user untuk pembuatan pengaduan.
- **Dynamic Data**: Admin dapat mengatur Data dinamis yang mana menunjang isi web (contoh Instansi, Role, Kategori, dll).
- **Responsive Landing Page**: Tampilan depan yang modern, cepat, dan adaptif di semua perangkat.

---

## 🛠️ Panduan Instalasi & Setup

Ikuti langkah-langkah di bawah ini untuk menjalankan project di lingkungan lokal Anda.

### 1. Cloning Repositori

Langkah pertama, unduh project dari repositori resmi:

```bash
git clone [https://github.com/AkmalYonan/sirespon.git](https://github.com/AkmalYonan/sirespon.git)
cd sirespon
```

### 2. Konfigurasi Environment

Salin file `.env.example` menjadi `.env` dan lengkapi kredensial yang diperlukan:

```bash
cp .env.example .env
```

**Pengaturan Database:**
Pastikan konfigurasi database di file `.env` sudah benar:

```bash
# Untuk MySQL :
DB_CONNECTION=mysql
DB_HOST=[IP_ADDRESS]
DB_PORT=3306
DB_DATABASE=sirespon
DB_USERNAME=root
DB_PASSWORD=

#Untuk PostgreSQL belum didukung, namun dapat disetup
```

**Pengaturan Email (SMTP):**
Konfigurasi server email untuk notifikasi (opsional):

```env
MAIL_MAILER=smtp
MAIL_HOST=[IP_ADDRESS]
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

### 3. Instalasi Dependensi

Instalasi dependensi PHP (Composer) dan Node.js (NPM):

```bash
# Install dependencies Node.js
npm install

# Install dependencies PHP
composer install

# Generate Laravel APP_KEY
php artisan key:generate

# Storage Symlink dengan Public
php artisan storage:link

# Compile assets (CSS/JS)
npm run dev or npm run build
```

### 4. Migrasi Database

Jalankan perintah migrasi untuk membuat tabel-tabel yang diperlukan:

```bash
Terdapat Laravel Migrations untuk migrasi database beserta seedernya yang dapat diperintah dengan
php artisan migrate
```

### 5. Menjalankan Aplikasi

Start server development Laravel:

```bash
php artisan serve
```

Akses aplikasi melalui browser pada alamat: `http://localhost:8000`

---

## 🔐 Akun Default

Setelah migrasi berhasil, Anda dapat login menggunakan akun berikut:

**Admin:**

- **Email**: [admin@gmail.com]
- **Password**: `password`

---

## 📂 Struktur Proyek

- `app/Http/Controllers`: Controller aplikasi.
- `app/Models`: Model Eloquent.
- `resources/views`: View Blade dan aset frontend.
- `database/migrations`: Skema database.
- `routes/web.php`: Definisi rute aplikasi.

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Jika Anda ingin berkontribusi pada proyek ini silahkan Contact pemilik Repo ini.
---

## 📄 Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT.

---

## 📞 Dukungan & Bantuan

Jika Anda mengalami kendala saat instalasi atau penggunaan, silakan periksa kembali konfigurasi `.env` atau hubungi tim support.

**Selamat menggunakan Sirespon!** 🚀
