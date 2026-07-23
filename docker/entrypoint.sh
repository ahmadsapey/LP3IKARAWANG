#!/bin/sh
set -e

echo "Starting Laravel setup..."

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
while ! nc -z mysql 3306; do
  sleep 1
done
echo "MySQL is ready!"

# Ensure proper permissions
echo "Setting permissions..."
mkdir -p storage/logs bootstrap/cache public/storage
chown -R www-data:www-data storage bootstrap/cache public

# Run migrations
echo "Running migrations..."
php artisan migrate --force || true

# Create storage link
echo "Creating storage link..."
rm -f public/storage
php artisan storage:link || ln -s ../storage/app/public public/storage

# Cache optimization
echo "Optimizing cache..."
php artisan optimize || true

# Clear caches
echo "Clearing caches..."
php artisan cache:clear || true
php artisan config:cache || true

echo "Setup completed! Starting server..."

# Start development server
php -S 0.0.0.0:8000 -t public
