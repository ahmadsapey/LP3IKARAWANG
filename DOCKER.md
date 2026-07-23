# Panduan Docker untuk Laravel LP3I Karawang

## Prasyarat
- Docker Desktop (Windows/Mac) atau Docker Engine (Linux)
- Docker Compose

## Setup dan Menjalankan Aplikasi

### 1. Clone dan Persiapan Awal

```bash
# Clone repository (jika belum)
git clone <repository-url>
cd LP3IKARAWANG

# Copy environment file
cp .env.example .env

# Update .env untuk Docker (opsional, sudah dikonfigurasi di docker-compose.yml)
# DB_HOST=mysql
# DB_USERNAME=laravel
# DB_PASSWORD=secret
# CACHE_DRIVER=redis
# SESSION_DRIVER=redis
```

### 2. Build dan Jalankan Container

```bash
# Build image
docker-compose build

# Jalankan container
docker-compose up -d

# Lihat logs
docker-compose logs -f app
```

**Catatan:** Saat container pertama kali dijalankan, entrypoint script akan otomatis:
- Menunggu MySQL siap
- Menjalankan migrations
- Membuat storage link
- Optimize cache
- Memulai development server

### 3. Menjalankan Artisan Commands

```bash
# Migrate database
docker-compose exec app php artisan migrate

# Storage link (jika diperlukan manual)
docker-compose exec app php artisan storage:link

# Seed database
docker-compose exec app php artisan db:seed

# Generate APP_KEY
docker-compose exec app php artisan key:generate

# Akses tinker
docker-compose exec app php artisan tinker
```

### 4. Mengelola Dependencies

```bash
# Install PHP dependencies
docker-compose exec app composer install

# Install Node dependencies
docker-compose exec app npm install

# Update dependencies
docker-compose exec app composer update
docker-compose exec app npm update
```

## Akses Aplikasi

- **Web Application**: http://localhost
- **MySQL Database**: localhost:3306
  - Username: laravel
  - Password: secret
  - Database: laravel
- **Redis**: localhost:6379

## Melihat Database

```bash
# Akses MySQL CLI
docker-compose exec mysql mysql -u laravel -p laravel

# Password: secret
```

## Mengembangkan dengan Docker

### Development Mode

```bash
# Untuk development dengan live reloading
docker-compose exec app npm run dev
```

### Production Build

```bash
# Build frontend assets untuk production
docker-compose exec app npm run build
```

## Troubleshooting

### Container tidak mau start
```bash
# Hapus container dan volume
docker-compose down -v

# Rebuild
docker-compose up -d --build
```

### Permission denied di storage
```bash
# Fix permissions
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Storage link tidak working
```bash
# Lihat apakah public/storage symlink sudah ada
docker-compose exec app ls -la public/

# Manual create storage link
docker-compose exec app php artisan storage:link

# Atau manual symlink
docker-compose exec app ln -s ../storage/app/public public/storage

# Cek apakah file bisa diakses
# Browser: http://localhost/storage/
```

### Akses file di storage
Setelah storage link dibuat, file di `storage/app/public/` bisa diakses via:
```
http://localhost/storage/nama-file
```

Pastikan sudah run `php artisan storage:link` saat setup awal.
```bash
# Cek status MySQL
docker-compose ps

# Lihat logs MySQL
docker-compose logs mysql
```

### Port sudah digunakan
Edit `docker-compose.yml` dan ubah port:
```yaml
ports:
  - "8080:80"  # Gunakan port 8080 di host
```

## Menghentikan dan Membersihkan

```bash
# Hentikan container
docker-compose down

# Hentikan dan hapus volume
docker-compose down -v

# Hapus image
docker-compose down --rmi all
```

## Struktur File Docker

- `Dockerfile` - Configuration untuk aplikasi Laravel
- `docker-compose.yml` - Konfigurasi multi-container (app, mysql, redis, nginx)
- `docker/nginx.conf` - Konfigurasi Nginx
- `.dockerignore` - File yang diignore saat build

## Environment Variables

Tersedia di `docker-compose.yml`:

| Variable | Default | Keterangan |
|----------|---------|-----------|
| DB_HOST | mysql | Hostname MySQL |
| DB_PORT | 3306 | Port MySQL |
| DB_DATABASE | laravel | Nama database |
| DB_USERNAME | laravel | Username MySQL |
| DB_PASSWORD | secret | Password MySQL |
| CACHE_DRIVER | redis | Cache driver |
| SESSION_DRIVER | redis | Session driver |
| QUEUE_CONNECTION | redis | Queue connection |

## Tips Performa

1. **Development**: Gunakan `docker-compose up` untuk hot-reloading
2. **Production**: Jalankan `npm run build` sebelum deploy
3. **Database**: Jangan lupa backup sebelum `docker-compose down -v`
4. **Logs**: Monitor dengan `docker-compose logs -f`

---

Untuk bantuan lebih lanjut, lihat dokumentasi di `docs/SETUP.md`
