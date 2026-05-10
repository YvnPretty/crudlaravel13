#!/bin/bash
set -e

# Crear archivo .env con SQLite
cat > .env << 'EOF'
APP_NAME=Laravel
APP_ENV=production
APP_DEBUG=true
APP_URL=https://crudlaravel13.onrender.com

DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite

SESSION_DRIVER=file
SESSION_LIFETIME=120
CACHE_STORE=file

LOG_CHANNEL=stack
LOG_LEVEL=debug
EOF

# Generar APP_KEY
php artisan key:generate --force

# Crear base de datos SQLite
touch /app/database/database.sqlite

# Dar permisos
chmod -R 775 storage bootstrap/cache
chmod 664 /app/database/database.sqlite

# Ejecutar migraciones
php artisan migrate --force

# Arrancar servidor
php artisan serve --host=0.0.0.0 --port=$PORT
