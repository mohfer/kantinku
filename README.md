# Kantinku

Aplikasi pesan makan berbasis Laravel dan Livewire.

## 🚀 Quick Start

### 1. Clone Repository

Clone project dari GitHub:

```bash
git clone https://github.com/mohfer/kantinku
```

```bash
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

### 5. Migrasi Database

Jalankan migrasi untuk membuat tabel database:

```bash
php artisan migrate
```

### 6. Build & Run

Build assets untuk production:

```bash
npm run build
```

Jalankan server Laravel:

```bash
composer run dev
```

Buka browser: `http://localhost:8000`

## 🎨 Membuat Komponen Livewire

### Contoh: Login Component

```bash
php artisan make:livewire Login
```

Akan membuat:
- `app/Livewire/Login.php`
- `resources/views/livewire/login.blade.php`

### Contoh Lainnya

```bash
php artisan make:livewire Counter
```

```bash
php artisan make:livewire BottomNavigation
```

```bash
php artisan make:livewire Auth/Register
```

### Cara Pakai

```blade
<livewire:login />
```