#!/bin/bash
set -e

# Wait for database to be ready
echo "Waiting for database..."
until php artisan db:show 2>/dev/null; do
  echo "Database is unavailable - sleeping"
  sleep 2
done

echo "Database is up"

# Generate app key if not set
php artisan key:generate --force 2>/dev/null || true

# Run database seed only on first run (when global_settings table doesn't exist)
DB_STATUS=$(php check-db-seeded.php 2>/dev/null || echo "empty")
if [ "$DB_STATUS" = "empty" ]; then
  echo "Initializing database..."
  php artisan db:seed --force
  echo "Database initialized."
fi

echo "Starting Apache"
exec apache2-foreground
