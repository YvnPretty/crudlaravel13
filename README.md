# CRUD Laravel 13 con Bootstrap 5

Este es un proyecto básico para la gestión de productos (Crear, Leer, Actualizar y Eliminar) construido paso a paso.

## Tecnologías Usadas
- **Framework:** Laravel 13
- **Estilos:** Bootstrap 5 (vía CDN)
- **Base de Datos:** MySQL / MariaDB

## Funcionalidades
- Listado de productos con paginación integrada de Bootstrap 5.
- Formulario para crear un nuevo producto con validación.
- Edición de productos existentes.
- Visualización de detalles de cada producto.
- Eliminación de productos con alerta de confirmación.
- Mensajes flash para confirmar las operaciones exitosas.

## Instalación Local

1. Clona este repositorio:
   ```bash
   git clone https://github.com/YvnPretty/crudlaravel13.git
   cd crudlaravel13
   ```

2. Instala las dependencias de PHP:
   ```bash
   composer install
   ```

3. Copia el archivo de entorno y configura tu base de datos:
   ```bash
   cp .env.example .env
   ```
   *No olvides configurar `DB_CONNECTION=mysql` y tus credenciales en el `.env`.*

4. Genera la llave de la aplicación:
   ```bash
   php artisan key:generate
   ```

5. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

6. Levanta el servidor local:
   ```bash
   php artisan serve
   ```
   Entra a `http://localhost:8000/productos` para ver el CRUD en acción.
