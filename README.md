# Laravel E-Commerce + Midtrans

Aplikasi web **e-commerce** yang dibangun dengan **Laravel 11** dan terintegrasi **payment gateway Midtrans**. Frontend memakai Tailwind CSS + Alpine.js + Flowbite.

## ✨ Fitur
- Katalog produk & keranjang belanja
- Checkout dengan pembayaran Midtrans
- Panel admin & manajemen produk

## 🛠️ Tech Stack
- **Backend:** PHP, Laravel 11
- **Frontend:** Blade, Tailwind CSS, Alpine.js, Flowbite, Vite
- **Payment:** Midtrans (lihat `PANDUAN_MIDTRANS.md`)

## 🚀 Menjalankan
```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```
Isi kredensial Midtrans (server/client key) di `.env`.

## 📄 Lisensi
Dibuat untuk keperluan pembelajaran.
