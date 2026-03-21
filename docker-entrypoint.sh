#!/bin/bash
set -e

<<<<<<< HEAD
# Wait for Cloud SQL to be reachable
echo "Waiting for database connection..."
until php -r "
try {
    \$pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 3]
    );
    echo 'connected';
} catch (Exception \$e) {
    echo 'waiting';
}
" 2>/dev/null | grep -q "connected"; do
    echo "Database not ready yet, retrying in 3s..."
    sleep 3
done
echo "Database is ready!"

# Create required Laravel storage directories
echo "==> Creating storage directories..."
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/app/public
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/bootstrap/cache
=======
# Database is guaranteed to be up by docker-compose depends_on healthcheck
echo "Database is ready (managed by docker-compose)"
>>>>>>> 288ed07856be2ef0e141ca0ae1c4324aea376035

# Set storage permissions
echo "==> Setting storage permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Generate app key if not already set
echo "==> Generating app key if not set..."
php artisan key:generate --force 2>/dev/null || true

# Clear old cache and rebuild for production
echo "==> Caching config, routes and views..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Starting Apache..."
exec apache2-foreground
