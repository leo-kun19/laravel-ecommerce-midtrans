# Panduan Setup Midtrans (Bahasa Indonesia)

Berikut adalah langkah-langkah untuk menghubungkan aplikasi Anda dengan Midtrans agar pembayaran dapat berjalan dan status order update otomatis.

## 1. Dapatkan Keys dari Midtrans Dashboard

1.  Login ke [Midtrans Dashboard](https://dashboard.midtrans.com/).
2.  Pastikan Anda berada di mode **Sandbox** (untuk testing) atau **Production** (untuk live).
3.  Masuk ke menu **Settings** -> **Access Keys**.
4.  Copy **Merchant ID**, **Client Key**, dan **Server Key**.

## 2. Update File `.env`

Buka file `.env` di project Anda dan isi bagian berikut:

```env
MIDTRANS_MERCHANT_ID=masukkan_merchant_id_anda
MIDTRANS_CLIENT_KEY=masukkan_client_key_anda
MIDTRANS_SERVER_KEY=masukkan_server_key_anda
MIDTRANS_IS_PRODUCTION=false 
# Set 'true' jika sudah siap live
```

> **PENTING**: Jangan pernah commit file `.env` ke public repository!

## 3. Konfigurasi Notification URL (Webhook)

Ini langkah paling penting agar status order berubah otomatis (misal dari "Pending" ke "Paid") tanpa user harus refresh halaman.

1.  Aplikasi Anda harus online (bukan localhost) agar bisa diakses Midtrans.
    *   Jika masih di localhost, gunakan **Ngrok**.
    *   Jalankan: `ngrok http 8000` (sesuaikan port laravel serve anda).
    *   Copy URL HTTPS dari Ngrok (contoh: `https://1234-abcd.ngrok-free.app`).

2.  Masuk ke **Midtrans Dashboard**.
3.  Menu **Settings** -> **Configuration**.
4.  Cari bagian **Notification URL**.
5.  Masukkan URL endpoint notifikasi kita:
    `[URL_APLIKASI_ANDA]/payments/midtrans-notification`
    
    Contoh jika pakai Ngrok:
    `https://1234-abcd.ngrok-free.app/payments/midtrans-notification`

6.  Klik **Update** / **Save**.

## 4. Testing

1.  Lakukan order seperti biasa di website.
2.  Lakukan pembayaran di simulator Midtrans.
3.  Cek status order di database atau halaman admin. Status harusnya berubah menjadi `paid` secara otomatis.
