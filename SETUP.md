# Panduan Setup Project di Server

## Persyaratan Server
- PHP 8.2 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Composer 2.x
- Node.js 16.x atau lebih tinggi
- NPM 8.x atau lebih tinggi
- Web Server (Apache/Nginx)
- SSL Certificate (untuk production)

## Langkah-langkah Setup

### 1. Persiapan Server
```bash
# Install required PHP extensions
sudo apt-get update
sudo apt-get install php8.2 php8.2-cli php8.2-mysql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath php8.2-intl
```

### 2. Clone Repository
```bash
# Clone repository ke server
git clone [URL_REPOSITORY] /var/www/legalify
cd /var/www/legalify
```

### 3. Setup Project

#### Install Dependencies
```bash
# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies
npm install
npm run build
```

#### Konfigurasi Environment
```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Edit file .env sesuai dengan konfigurasi server
nano .env
```

Konfigurasi yang perlu diubah di file .env:
```
APP_NAME=Legalify
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=legalify
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

#### Setup Database
```bash
# Jalankan migrations
php artisan migrate

# Jalankan seeders (jika ada)
php artisan db:seed
```

#### Setup Permissions
```bash
# Set permissions
sudo chown -R www-data:www-data /var/www/legalify
sudo find /var/www/legalify -type f -exec chmod 644 {} \;
sudo find /var/www/legalify -type d -exec chmod 755 {} \;
sudo chmod -R 775 /var/www/legalify/storage
sudo chmod -R 775 /var/www/legalify/bootstrap/cache
```

### 4. Konfigurasi Web Server

#### Untuk Nginx
Buat file konfigurasi baru:
```bash
sudo nano /etc/nginx/sites-available/legalify
```

Isi dengan konfigurasi berikut:
```nginx
server {
    listen 80;
    server_name domain-anda.com;
    root /var/www/legalify/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Aktifkan site:
```bash
sudo ln -s /etc/nginx/sites-available/legalify /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### 5. Setup SSL (Menggunakan Let's Encrypt)
```bash
sudo apt-get install certbot python3-certbot-nginx
sudo certbot --nginx -d domain-anda.com
```

### 6. Optimasi Laravel untuk Production
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 7. Setup Cron Job untuk Laravel Scheduler (jika diperlukan)
```bash
# Buka crontab
crontab -e

# Tambahkan line berikut
* * * * * cd /var/www/legalify && php artisan schedule:run >> /dev/null 2>&1
```

## Maintenance

### Cara Update Project
```bash
# Pull perubahan terbaru
git pull origin main

# Install dependencies
composer install --no-dev --optimize-autoloader
npm install
npm run build

# Jalankan migrations
php artisan migrate

# Clear & cache
php artisan optimize
php artisan view:cache
```

### Monitoring
- Cek error logs: `tail -f /var/www/legalify/storage/logs/laravel.log`
- Cek status PHP-FPM: `sudo systemctl status php8.2-fpm`
- Cek status Nginx: `sudo systemctl status nginx`

## Troubleshooting

### Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/legalify
sudo chmod -R 775 /var/www/legalify/storage
sudo chmod -R 775 /var/www/legalify/bootstrap/cache
```

### Database Connection Issues
1. Pastikan service MySQL berjalan: `sudo systemctl status mysql`
2. Cek kredensial di .env
3. Cek akses database: `mysql -u [username] -p`

### 500 Server Error
1. Cek logs di `/var/www/legalify/storage/logs/laravel.log`
2. Pastikan semua permission sudah benar
3. Cek PHP error logs: `sudo tail -f /var/log/php8.2-fpm.log`

### Cache Issues
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
