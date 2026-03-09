#!/bin/bash
set -e

# Database is guaranteed to be up by docker-compose depends_on healthcheck
echo "Database is ready (managed by docker-compose)"

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
