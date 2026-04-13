# ISP Service Ticket Management System

## 📋 Deskripsi
Aplikasi web CRUD (Create, Read, Update, Delete) untuk mengelola Service Ticket ISP menggunakan **Laravel**, **Blade**, **Tailwind CSS**, dan **jQuery**. Aplikasi ini dirancang untuk memudahkan tracking dan pengelolaan tiket layanan pelanggan ISP.

## 🛠️ Teknologi Stack
```
Backend: Laravel 10.x
Frontend: Blade Templates + Tailwind CSS 3.x + jQuery 3.x
Database: MySQL (Database: ISP)
ORM: Eloquent
```
## 📦 Fitur
- ✅ Dashboard statistik tiket
- ✅ CRUD lengkap Service Ticket
- ✅ Filter & Search tiket
- ✅ Status management (Open, In Progress, Closed)
- ✅ Responsive design
- ✅ Real-time validation
- ✅ Export data ke PDF/Excel

## 🗄️ Struktur Database
```
Database: ISP

Tabel:
- users (default Laravel)
- tickets
  - id (PK)
  - ticket_number (unique)
  - customer_name
  - customer_phone
  - customer_address
  - service_type (Internet, TV Kabel, Telepon)
  - issue_description
  - priority (Low, Medium, High, Urgent)
  - status (Open, In Progress, Closed)
  - technician_name
  - assigned_date
  - resolved_date
  - created_at
  - updated_at
```

## 🚀 Persyaratan Sistem
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL 5.7+
- Laravel 10.x

## 🛠️ Instalasi

### 1. Clone Repository
```bash
git clone <your-repo-url>
cd isp-service-ticket
```

### 2. Install Dependencies
```bash
# Composer
composer install

# NPM
npm install
npm run build
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
```

Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ISP
DB_USERNAME=root
DB_PASSWORD=

APP_URL=http://localhost:8000
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Migrasi Database
```bash
php artisan migrate
```

### 6. Seed Data (Opsional)
```bash
php artisan db:seed
```

### 7. Jalankan Server
```bash
php artisan serve
```

Aplikasi siap diakses di `http://localhost:8000`

## 👥 Akun Default
```
Email: admin@isp.com
Password: password
```

## 📁 Struktur Folder
```
├── app/
│   ├── Http/Controllers/TicketController.php
│   ├── Models/Ticket.php
│   └── ...
├── database/
│   ├── migrations/
│   │   └── 2024_xx_xx_create_tickets_table.php
│   └── seeders/
├── public/
│   └── css/app.css
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── tickets/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   └── dashboard.blade.php
│   └── js/
└── routes/
    └── web.php
```

## 🎨 Customisasi

### Tailwind Config
Edit `tailwind.config.js` untuk warna custom:
```js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: '#1E40AF', // Warna ISP
        secondary: '#9333EA'
      }
    }
  }
}
```

### Tambah Status Baru
1. Tambah di Model `Ticket.php`:
```php
const STATUSES = ['open', 'in-progress', 'closed', 'cancelled'];
```

2. Update migration jika perlu.

## 🔧 Perintah Artisan
```bash
# Clear cache
php artisan optimize:clear

# Migrasi fresh
php artisan migrate:fresh --seed

# Generate ticket number
php artisan tinker
>>> App\Models\Ticket::generateTicketNumber()
```

## 📱 Demo Screenshots
```
[Dashboard] [Ticket List] [Create Ticket] [Edit Ticket]
```

## 🐛 Troubleshooting

| Masalah | Solusi |
|---------|--------|
| `npm run dev` error | `npm install` ulang |
| 500 Error | `php artisan config:cache` |
| Tailwind tidak work | `npm run build` |
| DB Connection failed | Cek `.env` |

## 📄 Lisensi
MIT License - free for commercial use.

## 🤝 Kontribusi
1. Fork repository
2. Buat feature branch
3. Commit changes
4. Push ke branch
5. Buat Pull Request

## 📞 Support
- Email: support@isp.com
- WhatsApp: +62 xxx xxx xxxx

---

**© 2024 ISP Service Ticket System**