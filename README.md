# Website Edukasi Gizi Ibu dan Anak (Laravel)

Folder ini berisi file-file yang perlu ditimpa/ditambahkan ke proyek Laravel baru.

## Cara memasang
1. Pasang PHP 8.2+, Composer, lalu buat proyek baru:
   composer create-project laravel/laravel edukasi-gizi
2. Salin seluruh isi folder ini ke dalam folder `edukasi-gizi` (pilih "Replace" untuk routes/web.php).
3. Jalankan:
   cd edukasi-gizi
   php artisan serve
4. Buka http://127.0.0.1:8000

## Struktur
- routes/web.php                         -> daftar halaman
- app/Http/Controllers/PageController.php -> pengendali halaman
- config/edukasi.php                     -> SELURUH isi materi (ubah teks di sini)
- resources/views/                       -> template Blade (layouts, partials, beranda, plate, mpasi, about)
- public/css/style.css, public/js/app.js -> tampilan dan menu
- public/images/                         -> poster dan foto profil (ganti file bila perlu)

Halaman: /  /isi-piringku/ibu-hamil  /isi-piringku/ibu-menyusui  /mpasi/{6-8|9-11|12-23}  /about-me
