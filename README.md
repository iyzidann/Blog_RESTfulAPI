# Blog API - Laravel RESTful API

Sebuah RESTful API sederhana menggunakan Laravel untuk manajemen artikel blog, kategori, dan autentikasi menggunakan JWT.

## 📦 Fitur Utama

- CRUD Artikel
- CRUD Kategori
- Pencarian Artikel berdasarkan kategori atau keyword
- Autentikasi JWT (Register, Login, Logout)

---

## 🚀 Instalasi

### 1. Clone repository ini
```bash
git clone https://github.com/username/blog-api.git
cd blog-api
```

### 2. Install dependencies
```bash
composer install
```

### 3. Copy file `.env`
```bash
cp .env.example .env
```

### 4. Generate APP_KEY
```bash
php artisan key:generate
```

### 5. Setup database di `.env`
```ini
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

### 6. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

### 7. Generate JWT secret
```bash
php artisan jwt:secret
```

### 8. Jalankan server lokal
```bash
php artisan serve
```

---

## 🧪 Cara Menggunakan API

### 🔐 Autentikasi

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| `POST` | `/api/register` | Daftar akun baru |
| `POST` | `/api/login` | Login dan dapatkan token |
| `POST` | `/api/logout` | Logout |

**Gunakan token JWT pada header:**
```
Authorization: Bearer {token}
```

### 📘 Endpoint Artikel

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| `GET` | `/api/articles` | List artikel |
| `POST` | `/api/articles` | Tambah artikel baru |
| `GET` | `/api/articles/{id}` | Detail artikel |
| `PUT` | `/api/articles/{id}` | Perbarui artikel |
| `DELETE` | `/api/articles/{id}` | Hapus artikel |
| `GET` | `/api/articles/search?category_id=1&keyword=laravel` | Cari artikel |

### 📚 Endpoint Kategori

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| `GET` | `/api/categories` | List kategori |
| `POST` | `/api/categories` | Tambah kategori |
| `GET` | `/api/categories/{id}` | Detail kategori |
| `PUT` | `/api/categories/{id}` | Perbarui kategori |
| `DELETE` | `/api/categories/{id}` | Hapus kategori |

---

## Dokumentasi API

Berikut link dokumentasi API menggunakan Postman
**Link Dokumentasi**: [https://documenter.getpostman.com/view/39526077/2sB2qgcxQY](https://documenter.getpostman.com/view/39526077/2sB2qgcxQY)

---

## 📽️ Demo Video

Lihat demo penggunaan API di video berikut:

📺 **Link Video**: []()

---