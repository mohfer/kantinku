# 🍽️ Kantinku

**Kantinku** adalah aplikasi pemesanan makanan kantin yang modern dan mudah digunakan. Dibangun dengan Laravel dan Livewire untuk pengalaman yang cepat dan responsif.

## 📋 Tentang Aplikasi

Kantinku memudahkan mahasiswa untuk memesan makanan dari kantin kampus tanpa harus mengantri. Merchant/penjual kantin dapat mengelola menu dan pesanan melalui dashboard admin yang powerful menggunakan Filament.

### ✨ Fitur Utama

**Untuk Mahasiswa:**

-   🔐 Autentikasi (Login/Register/Reset Password)
-   🏪 Browse kantin dan menu makanan
-   🛒 Keranjang belanja
-   📦 Riwayat pesanan
-   🔔 Notifikasi status pesanan
-   👤 Manajemen profil
-   💳 Sistem pembayaran terintegrasi

**Untuk Penjual/Admin Kantin:**

-   📊 Dashboard analytics
-   🍔 Manajemen menu dan kategori
-   🏬 Manajemen kantin
-   📋 Manajemen pesanan
-   👥 Manajemen mahasiswa
-   💰 Laporan penjualan

### 🛠️ Tech Stack

#### Backend

-   **Framework:** Laravel 12.x
-   **Language:** PHP 8.2+
-   **Server:** Laravel Octane with FrankenPHP
-   **Queue:** Laravel Queue System
-   **ORM:** Eloquent
-   **Slugs:** eloquent-sluggable 12.0

#### Frontend

-   **Framework:** Livewire 3.6+
-   **Styling:** Tailwind CSS 4.1
-   **JavaScript:** Alpine.js (bundled with Livewire)
-   **HTTP Client:** Axios
-   **Build Tool:** Vite 7.0

#### Admin Panel

-   **Dashboard:** Filament 4.0

#### Database

-   **DBMS:** MySQL / MariaDB
-   **Migrations:** Laravel Migration System

#### Payment & Notifications

-   **Payment Gateway:** Xendit PHP SDK 7.0
-   **Notifications:** WhatsApp API (WAHA)

## 🚀 Instalasi

### Prerequisites

Pastikan sistem Anda sudah terinstall:

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   MySQL/MariaDB

### 1. Clone Repository

```bash
git clone https://github.com/mohfer/kantinku.git
cd kantinku
```

### 2. Install Dependencies

Install dependencies PHP:

```bash
composer install
```

Install dependencies JavaScript:

```bash
npm install
```

### 3. Setup Environment

Copy file environment:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kantinku
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Konfigurasi Tambahan (Opsional)

Sesuaikan konfigurasi lainnya di file `.env`:

```env
# Application
APP_NAME="KantinKu"
APP_URL=http://localhost:8000

# Queue & Session
QUEUE_CONNECTION=database
SESSION_DRIVER=database
CACHE_STORE=database

# Xendit Payment Gateway
XENDIT_SECRET_KEY=your_xendit_secret_key

# WhatsApp Notification (WAHA)
WAHA_API_URL=http://localhost:3000
WAHA_SESSION=default
WAHA_API_KEY=your_waha_api_key

# Email (opsional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_FROM_ADDRESS="hello@kantinku.com"

# Laravel Octane
OCTANE_SERVER=frankenphp
```

### 6. Migrasi & Seeder Database

Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

### 7. Storage Link

Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

### 8. Build Assets & Run

Build assets:

```bash
npm run build
```

Jalankan development server:

```bash
composer run dev
```

Atau untuk production dengan FrankenPHP:

```bash
php artisan octane:start
```

Buka browser: `http://localhost:8000`

## 🔑 Akun Demo

Setelah menjalankan seeder, gunakan akun berikut untuk login:

### Admin Panel (Filament)

-   **URL:** `http://localhost:8000/auth/login`
-   **Email:** `admin@kantinku.com`
-   **Password:** `password`

### Mahasiswa

-   **URL:** `http://localhost:8000/auth/login`
-   **Email:** `budi@example.com`
-   **Password:** `password`

### Penjual Kantin (Filament)

-   **URL:** `http://localhost:8000/auth/login`
-   **Email:** `john@example.com`
-   **Password:** `password`

## 📁 Struktur Folder

```
kantinku/
├── app/
│   ├── Filament/         # Admin panel components
│   ├── Http/             # Controllers & Middleware
│   ├── Livewire/         # Livewire components
│   ├── Models/           # Eloquent models
│   ├── Notifications/    # Notification classes
│   └── Services/         # Business logic services
├── config/               # Configuration files
├── database/
│   ├── migrations/       # Database migrations
│   └── seeders/          # Database seeders
├── public/               # Public assets
├── resources/
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── views/            # Blade templates
└── routes/               # Application routes
```

## 🐛 Troubleshooting

### Error: "Class not found"

```bash
composer dump-autoload
```

### Error: "Permission denied" pada storage

```bash
chmod -R 775 storage bootstrap/cache
```

### Asset tidak muncul

```bash
npm run build
php artisan storage:link
php artisan optimize:clear
```

### Database connection error

-   Pastikan MySQL service running
-   Cek kredensial database di `.env`
-   Pastikan database sudah dibuat

## 🙏 Acknowledgments

-   Laravel Framework
-   Livewire
-   Filament PHP
-   Tailwind CSS
-   Alpine.js