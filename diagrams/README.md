# Dokumentasi Diagram E-Commerce Laravel

Folder ini berisi diagram-diagram untuk sistem E-Commerce yang dibangun dengan Laravel dan integrasi Midtrans.

## Daftar Diagram

### 1. ERD (Entity Relationship Diagram)
**File:** `ERD.puml`

Diagram ini menunjukkan struktur database dan relasi antar tabel:
- **users**: Menyimpan data pengguna (admin & user)
- **categories**: Kategori produk
- **products**: Data produk dengan stok dan harga
- **orders**: Pesanan dengan status dan informasi pembayaran Midtrans
- **order_items**: Detail item dalam setiap pesanan

**Relasi:**
- User memiliki banyak Order (1:N)
- Order memiliki banyak Order Item (1:N)
- Product dapat ada di banyak Order Item (1:N)
- Category memiliki banyak Product (1:N)

### 2. Class Diagram
**File:** `ClassDiagram.puml`

Diagram ini menunjukkan struktur class aplikasi:
- **Models**: User, Category, Product, Order, OrderItem
- **Traits**: HasSlug, HasOrderStatus, ProductInventory
- **Controllers**: AuthController, ProductController, CategoryController, OrdersController, UserCheckoutController, PaymentNotificationController, UserController
- **Middleware**: AdminMiddleware

### 3. Activity Diagrams

#### 3.1 Authentication Process
**File:** `ActivityDiagram_Authentication.puml`

Menggambarkan alur:
- Registrasi user baru
- Login (dengan pembedaan role admin/user)
- Logout

#### 3.2 User Checkout Process
**File:** `ActivityDiagram_UserCheckout.puml`

Menggambarkan alur lengkap checkout:
1. User menambahkan produk ke cart
2. Mengisi informasi pengiriman
3. Sistem membuat order dan order items
4. Integrasi dengan Midtrans untuk pembayaran
5. Webhook notification dari Midtrans
6. Update status order otomatis

#### 3.3 Product Management
**File:** `ActivityDiagram_ProductManagement.puml`

Menggambarkan alur admin mengelola produk:
- Create: Menambah produk baru dengan upload gambar
- Update: Mengubah data produk
- Delete: Menghapus produk
- View: Melihat daftar produk

#### 3.4 Admin Order Management
**File:** `ActivityDiagram_AdminOrderManagement.puml`

Menggambarkan alur admin mengelola pesanan:
- Melihat daftar order dengan search & filter
- Update status order (pending → paid → processing → shipped → delivered)
- Input resi code untuk status shipped
- Validasi dan error handling

## Cara Menggunakan

### Online (Rekomendasi)
1. Buka [PlantUML Online Editor](http://www.plantuml.com/plantuml/uml/)
2. Copy-paste isi file `.puml` ke editor
3. Diagram akan ter-render otomatis

### VS Code
1. Install extension "PlantUML" oleh jebbs
2. Buka file `.puml`
3. Tekan `Alt+D` untuk preview

### Generate Image
```bash
# Install PlantUML terlebih dahulu
# Kemudian jalankan:
java -jar plantuml.jar diagrams/*.puml
```

## Notasi yang Digunakan

### ERD
- **Primary Key**: Underline dan bold
- **Foreign Key**: Italic
- **Unique**: Warna hijau
- **Relasi**: 
  - `||--o{` : One to Many
  - `||--|{` : One to Many (mandatory)

### Class Diagram
- **+** : public method
- **-** : private attribute
- **{static}** : static method
- **<<trait>>** : PHP trait
- Panah solid: inheritance/implementation
- Panah putus-putus: dependency

### Activity Diagram
- **|Actor|** : Swimlane untuk aktor
- **:Action;** : Activity/action
- **if-then-else** : Decision point
- **note** : Catatan tambahan
- **start/stop** : Titik awal/akhir

## Fitur Utama yang Tergambar

1. **Multi-role System**: Admin dan User dengan permission berbeda
2. **Product Management**: CRUD produk dengan kategori dan stok
3. **Shopping Cart**: Sistem keranjang belanja
4. **Checkout Process**: Integrasi lengkap dengan Midtrans
5. **Payment Gateway**: Snap Token, webhook notification
6. **Order Management**: Status tracking dari pending hingga delivered
7. **Inventory Management**: Auto decrease/increase stock
8. **Shipping Tracking**: Resi code untuk pengiriman

## Status Order Flow

```
pending → paid → processing → shipped → delivered
   ↓        ↓         ↓          ↓
cancelled ← ← ← ← ← ← ← ← ← ← ← ←
```

## Teknologi yang Digunakan

- **Framework**: Laravel 11
- **Payment Gateway**: Midtrans (Snap)
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum/Session
- **Frontend**: Blade Templates + Tailwind CSS
