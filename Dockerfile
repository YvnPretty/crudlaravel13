FROM php:8.3-cli

# Instalar dependencias del sistema requeridas por Laravel y Vite
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    nodejs \
    npm \
    sqlite3 \
    libsqlite3-dev

# Instalar extensiones de PHP (MySQL, SQLite, Zip)
RUN docker-php-ext-install pdo_mysql pdo_sqlite zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar todos los archivos del proyecto al contenedor
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias de Node.js y compilar Vite
RUN npm install && npm run build

# Iniciar el servidor de Laravel
CMD php artisan serve --host=0.0.0.0 --port=$PORT
