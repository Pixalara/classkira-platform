# ClassKira - Docker Setup

## Quick Start

1. **Build and run with Docker Compose:**
   ```bash
   docker-compose up -d --build
   ```

2. **Access the application:**
   - Frontend: http://localhost:8080
   - Login: http://localhost:8080/login

3. **Default superadmin credentials** (from environment):
   - Email: `admin@classkira.com`
   - Password: `password`

## Configuration

Edit `docker-compose.yml` to change:
- `ADMIN_EMAIL` - Superadmin login email
- `ADMIN_PASSWORD` - Superadmin password
- `DB_PASSWORD` - Database password
- Port mapping (default 8080:80)

## Database Setup

On first run, the container automatically:
1. Waits for MySQL to be ready
2. Generates `APP_KEY` if needed
3. Imports all tables and seed data from `install.sql`
4. Creates the superadmin user

## Manual Commands

```bash
# Run database seed manually
docker-compose exec app php artisan db:seed --force

# Clear cache
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear

# View logs
docker-compose logs -f app
```
