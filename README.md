# README.md

## Cara Instalasi & Menjalankan Sistem Secara Lokal

1. **Clone Repository**

   ```bash
   git clone https://github.com/username/nama-repo.git
   cd nama-repo
   ```

2. **Install Dependensi Backend (Laravel)**

   ```bash
   composer install
   ```

3. **Install Dependensi Frontend**

   ```bash
   npm install
   npm run dev
   ```

4. **Salin File Environment**

   ```bash
   cp .env.example .env
   ```

5. **Atur Konfigurasi di `.env`**

   Sesuaikan dengan pengaturan database lokal Anda:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Generate App Key**

   ```bash
   php artisan key:generate
   ```

7. **Migrasi Database & Seeder Data Awal**

   ```bash
   php artisan migrate --seed
   ```

8. **Jalankan Server Lokal**

   ```bash
   php artisan serve
   ```

   Akses aplikasi melalui: [http://localhost:8000](http://localhost:8000)

9. **Login ke Filament Admin (jika tersedia akun default)**

   - Email: `admin@domain.com`
   - Password: `password`

---

> Pastikan Anda sudah menginstal PHP, Composer, Node.js, npm, dan database server sebelum mengikuti langkah di atas.